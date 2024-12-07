<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{   
    //NANTI UBAH INI
    public function index()
    {
        $categories = Category::all();

        return view('superAdmin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('superAdmin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('path')) {
            $validatedData['path'] = $request->file('path')->store('images/categories', 'public');
        }

        Category::create($validatedData);

        return redirect()->route('superAdmin.categories.index')->with('success', 'Category added successfully.');
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('path')) {
            if ($category->path) {
                $pathDelete = 'public/' . $category->path;
                Storage::delete($pathDelete);
            }

            $validatedData['path'] = $request->file('path')->store('images/categories', 'public');
        } else {
            $validatedData['path'] = $category->path;
        }

        $category->update($validatedData);

        return redirect()->route('superAdmin.categories.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Category $category)
    {
        if ($category->path && Storage::disk('public')->exists($category->path)) {
            Storage::disk('public')->delete($category->path);
        }

        $category->delete();

        return redirect()->route('superAdmin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
