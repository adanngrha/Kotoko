<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CartController extends Controller
{
    public function showProduct(Request $request, $productId ) {
        $product = Product::where('id', $productId)->first();
        $products = Product::all();
        $categories = Category::all();
        return view('cart.showProduct', compact('product', 'products', 'categories'), ['title'=>'Product']);
    }
}
