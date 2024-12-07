<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $shoppingCart = $user->shoppingCart()->with('product')->get();

        $total = $shoppingCart->sum(function ($item) {
            return $item->product->price * ($item->quantity ?? 1);
        });

        $products = $shoppingCart->pluck('product');

        return view('customer.shoppingCart.index', compact('products', 'total'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $shoppingCart = $user->shoppingCart()->firstOrNew(['product_id' => $request->product_id]);

        $message = $shoppingCart->exists ? 'Removed from ShoppingCart.' : 'Added to ShoppingCart.';

        $shoppingCart->exists ? $shoppingCart->delete() : $shoppingCart->save();

        return redirect()->back()->with('success', $message);
    }

    public function dashboardStore(Request $request)
    {
        $user = Auth::user();

        $shoppingCart = $user->shoppingCart()->firstOrNew(['product_id' => $request->product_id]);

        $message = $shoppingCart->exists ? 'Removed from ShoppingCart.' : 'Added to ShoppingCart.';

        $addedToCart = !$shoppingCart->exists;

        $shoppingCart->exists ? $shoppingCart->delete() : $shoppingCart->save();

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => $message,
            'added_to_cart' => $addedToCart,
        ]);
    }
}
