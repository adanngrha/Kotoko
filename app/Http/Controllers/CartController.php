<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function showProduct(Request $request, $productId ) {
        $product = Product::where('id', $productId)->first();
        $products = Product::all();
        $categories = Category::all();
        return view('cart.showProduct', compact('product', 'products', 'categories'), ['title'=>'Product']);
    }

    public function addProduct(Request $request, $productId) {
        $user=request()->user();

        $user->carts()->attach($productID, ['quantity' => $request->quantity]);

        return redirect()->back();
    }

    public function showCart() {
        
    }
}
