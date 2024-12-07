<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateCheckoutRequest;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Checkout::with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('superAdmin.order.index', compact('orders'));
    }

    public function show(Checkout $order)
    {
        return view('superAdmin.order.details', compact('order'));
    }

    public function update(Checkout $order)
    {

        DB::transaction(function () use ($order) {
            $order->update([
                'approved' => true,
            ]);
        });

        return redirect()->route('superAdmin.orders.index', $order->id)->with('success', 'Checkout information updated successfully!');
    }
}
