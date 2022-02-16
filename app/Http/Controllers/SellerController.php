<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class SellerController extends Controller
{
    public function index() {
        $products=Product::all();
        return view('seller.product.index', compact('products'), ['title'=>'List Product']);
    }

    public function createProduct() {
        $categories =  DB::table('categories')->get();
        return view('seller.product.addProduct', compact('categories'), [
            'title' => 'Add Product']);
    }

    public function storeProduct(Request $request) {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'categoryId'=>'required',
            'description'=>'required',
            'location'=>'required',
        ]);

        $product=Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'category_id'=>$request->categoryId,
            'description'=>$request->description,
            'location'=>$request->location
        ]);

        return redirect('/list-product');
    }

    public function editProduct($productId) {
        $product=Product::where('id', $productId)->first();
        $categories =  DB::table('categories')->get();

        return view('seller.product.editProduct', compact('product', 'categories'), ['title'=>'Edit Product']);
    }

    public function updateProduct(Request $request, $productId) {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'categoryId'=>'required',
            'description'=>'required',
            'location'=>'required',
        ]);

        Product::where('id', $productId)->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'category_id'=>$request->categoryId,
            'description'=>$request->description,
            'location'=>$request->location
        ]);

        return redirect('/list-product');
    }

    public function destroyProduct($productId) {
        Product::destroy($productId);
        return redirect('/list-product');
    }
}
