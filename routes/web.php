<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
})->name('home');

//login regis
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'addLogin']);
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'addRegister']);


Route::middleware('auth')->group(function() {
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::middleware('isBuyer')->group(function() {

    });

    Route::middleware('isSeller')->group(function() {

    });
});
