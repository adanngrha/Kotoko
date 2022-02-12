<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {
        $products = Product::with('category')->get();
        $categories = Category::all();

        return view('index', [
            'title' => 'Welcome to Kotoko!',
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
