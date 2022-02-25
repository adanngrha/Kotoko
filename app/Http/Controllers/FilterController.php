<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class FilterController extends Controller
{
    public function search(Request $request)
    {
        $title = '';

        if ($request->category == 'all') {
            $products = Product::where('name', 'like', '%' . $request->search . '%')->with('category')->get();
            $title = " All Categories";
        } else {
            $category_id = Category::firstWhere('slug', $request->category);
            $products = Product::where('name', 'like', '%' . $request->search . '%')->where('category_id', $category_id->id)->with('category')->get();
            $title = $category_id->name;
        }

        $user = User::find(auth()->id());
        $categories = Category::all();

        return view('search', [
            'title' => 'Search Results in ' . $title,
            'user' => $user,
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function showByCategory(Category $category)
    {
        // return dd($category);
        $products = Product::where('category_id', $category->id)->with('category')->get();
        // return dd($products);
        $title = $category->name;

        $user = User::find(auth()->id());
        $categories = Category::all();

        return view('showByCategory', [
            'title' => $title . ' Category',
            'user' => $user,
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
