<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::limit(8)->get();
        $shoppingCartItems = [];

        if (Auth::check()) {
            $user = Auth::user();
            foreach ($products as $product) {
                $shoppingCartItems[$product->id] = ShoppingCart::where('user_id', $user->id)
                    ->where('product_id', $product->id)
                    ->exists();
            }
        }

        return view('customer.dashboard.index', compact('categories', 'products', 'shoppingCartItems'));
    }


    public function show(Category $category)
    {
        $products = $category->products;

        return view('customer.product.index', compact('products'));
    }

}
