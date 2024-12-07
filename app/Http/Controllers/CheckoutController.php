<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Checkout;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Checkout::where('user_id', $user->id)->orderBy("created_at", "desc")->paginate(10);

        return view('customer.order.index', compact('orders'));
    }

    public function show(Checkout $checkout)
    {

        return view('customer.order.details', compact('checkout'));
    }

    public function store(StoreCheckoutRequest $request)
    {
        $validatedData = $request->validated();

        DB::transaction(function () use ($validatedData) {
            foreach ($validatedData['products'] as $productId => $productData) {
                $quantity = $productData['quantity'];
                $price = $productData['price'];
                $total_price = $quantity * $price;

                Checkout::create([
                    'user_id' => $validatedData['user_id'],
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price_per_item' => $price,
                    'total_price' => $total_price,
                ]);

                Product::where('id', $productId)
                    ->decrement('stock', $quantity);

                $user = Auth::user();

                ShoppingCart::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->delete();
            }
        });

        return redirect()->route('checkout.index')->with('success', 'Checkouted successfully!');
    }

    public function update(UpdateCheckoutRequest $request, Checkout $checkout)
    {
        $validatedData = $request->validated();
        $user = Auth::user();

        if ($request->hasFile('proof_of_payment_path')) {
            $path = $request->file('proof_of_payment_path')->store('images/payment/proof', 'public');
            $validatedData['proof_of_payment_path'] = $path;
        }

        DB::transaction(function () use ($checkout, $validatedData) {
            $checkout->update($validatedData + [
                'payment_status' => true
            ]);
        });

        return redirect()->route('checkout.show', $checkout->id)->with('success', 'Checkout information updated successfully!');
    }

    public function destroy(Checkout $checkout)
    {
        $checkout->delete();

        return redirect()->route('checkout.index')->with('success', 'Order Cancelled!.');
    }
}
