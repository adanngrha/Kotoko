<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class SearchController extends Controller
{
    public function showByCategory(Request $request, $categoryId) {
        $products = Product::where('category_id', $categoryId)->with('category')->get();
        $category = Category::where('id', $categoryId)->first();
        $title = $category->name;

        $user = User::find(auth()->id());
        $categories = Category::all();

        return view('showByCategory', compact('products'), [
            'title' => 'Results in ' . $title ,
            'user' => $user,
            // 'products' => $products,
            'categories' => $categories,
        ]);
    }
}
