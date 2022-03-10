<?php

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;

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
    
    return view('index', [
        'title' => 'Welcome to Kotoko!',
        'products' => $products,
    ]);

})->name('home');

// Filter
Route::get('/search', [FilterController::class, 'search'])->name('search');
Route::get('/category/{category:slug}', [FilterController::class, 'showByCategory'])->name('category');

// Authentication
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'addLogin']);
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'addRegister']);

// Show Product
Route::get('/show-product/{productId}', [CartController::class, 'showProduct'])->name('product');

Route::middleware('auth')->group(function() {

    Route::get('/logout', [LoginController::class, 'logout']);

    Route::middleware('isBuyer')->group(function() {

        // Accounts
        Route::get('/account', [AccountController::class, 'index'])->name('account');
        Route::prefix('account')->group(function () {
            Route::get('/edit', [AccountController::class, 'showEdit'])->name('showEditAccount');
            Route::post('/edit', [AccountController::class, 'editAccount'])->name('editAccount');
            Route::get('/change-email', [AccountController::class, 'indexEmail'])->name('indexEmail');
            Route::post('/change-email', [AccountController::class, 'changeEmail'])->name('changeEmail');
            Route::get('/change-password', [AccountController::class, 'indexPass'])->name('indexPass');
            Route::post('/change-password', [AccountController::class, 'changePass'])->name('changePass');
        });

        // Addresses
        Route::resource('/address', AddressController::class);
        Route::get('/address-main/{id}', [AddressController::class, 'main']);

        // Cart
        Route::post('show-product/add-product/{productId}', [CartController::class, 'addProduct']);
        Route::get('view-cart', [CartController::class, 'showCart']);
        Route::delete('view-cart/{cartId}', [CartController::class, 'deleteCart']);
        Route::put('view-cart/edit/{cartId}', [CartController::class, 'editCart']);

        // Orders
        Route::resource('/orders', OrderController::class);

        // Checkout
        Route::get('/checkout', [CheckoutController::class, 'showCheckout']);

        // Wishlist
        Route::get('/wishlist', [WishlistController::class, 'index']);
        Route::get('/wishlist/{id}', [WishlistController::class, 'add']);
        Route::get('/wishlist/delete/{id}', [WishlistController::class, 'delete']);

    });

    Route::middleware('isSeller')->group(function() {

        // Seller Products
        Route::resource('/products', ProductController::class);

    });

    Route::middleware('isAdmin')->group(function () {

    });
});
