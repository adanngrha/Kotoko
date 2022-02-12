<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $products = Product::with('category')->get();
    $categories = Category::all();

    return view('index', [
        'title' => 'Welcome to Kotoko!',
        'products' => $products,
        'categories' => $categories,
    ]);
});
