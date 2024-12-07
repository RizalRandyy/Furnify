<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favoriteProductsIds = Favorite::where('user_id', Auth::id())->pluck('product_id');
        $products = Product::whereIn('id', $favoriteProductsIds)->get();

        return view('customer.product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $favorite = Favorite::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();

        $message = $favorite ? 'Removed from favorites' : 'Added to favorites';
        
        $favorite ? $favorite->delete() : Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);

        return redirect()->back()->with('success', $message);
    }
}
