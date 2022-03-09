<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        $products = Wishlist::where('user_id', $user->id)->with('product')->get();
        return view('wishlist.index', [
            'title' => 'My Wishlist',
            'products' => $products,
        ]);
    }

    public function add($product_id)
    {
        $user = User::find(auth()->id());
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $product_id,
        ]);
        return redirect()->back();
    }

    public function delete($product_id)
    {
        $user = User::find(auth()->id());
        Wishlist::where('user_id', $user->id)->where('product_id', $product_id)->delete();
        return redirect('/wishlist')->with('success', 'Wishlisted product successfully removed.');
    }
}
