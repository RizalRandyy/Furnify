<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->orderBy('categories.name')
        ->select('products.*')
        ->paginate(10);

        return view('superAdmin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('superAdmin.product.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('path')) {
            $validatedData['path'] = $request->file('path')->store('images/products', 'public');
        }

        Product::create($validatedData);

        return redirect()->route('superAdmin.products.index')->with('success', 'Product added successfully.');
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('path')) {
            if ($product->path) {
                $pathDelete = 'public/' . $product->path;
                Storage::delete($pathDelete);
            }

            $validatedData['path'] = $request->file('path')->store('images/products', 'public');
        } else {
            $validatedData['path'] = $product->path;
        }

        $product->update($validatedData);

        return redirect()->route('superAdmin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->path && Storage::disk('public')->exists($product->path)) {
            Storage::disk('public')->delete($product->path);
        }

        $product->delete();

        return redirect()->route('superAdmin.products.index')->with('success', 'Product deleted successfully.');
    }
}
