<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorite;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class ProductCustomerController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('customer.product.index', compact('products'));
    }

    public function show(Product $product)
    {
        $products = Product::where('id', '!=', $product->id)->limit(8)->get();

        $favorite = $shoppingCart = false;

        if (Auth::check()) {
            $user = Auth::user();
            $favorite = Favorite::where('user_id', $user->id)->where('product_id', $product->id)->exists();
            $shoppingCart = ShoppingCart::where('user_id', $user->id)->where('product_id', $product->id)->exists();
        }

        return view('customer.product.details', compact('product', 'products', 'favorite', 'shoppingCart'));
    }

    
}
