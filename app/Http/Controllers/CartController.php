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
        $name = $product->name;
        return view('product.index', compact('product', 'products', 'categories'), ['title'=>$name]);
    }

    public function addProduct(Request $request, $productId) {
        $user=request()->user();

        $user->cart()->attach($productId, ['quantity' => $request->quantity]);

        return redirect()->back();
    }

    public function showCart() {
        $user = request()->user();
        $user->load('cart');
        $carts = $user->cart;

        return view('cart.viewCart', compact('carts'),  ['title'=>'My Cart']);
    }

    public function deleteCart($cartId) {
        $user =request()->user();
        $cart = Cart::where('id', $cartId)->first();

        $user->cart()->detach($cart->product->id);
        return redirect()->back()->with('status', 'Cart data successfully delete!');
    }

    public function editCart(Request $request, $cartId) {
        $cart = Cart::where('id', $cartId)->update(['quantity' => $request->quantity]);
        return redirect()->back()->with('status', 'Data cart successfully update!');
    }
}
