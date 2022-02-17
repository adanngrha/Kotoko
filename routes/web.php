<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SellerController;
use App\Models\Address;
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

//product-seller
Route::get('/list-product', [SellerController::class, 'index']);
Route::get('/add-product', [SellerController::class, 'createProduct']);
Route::post('/add-product', [SellerController::class, 'storeProduct']);
Route::get('/edit-product/{productId}', [SellerController::class, 'editProduct']);
Route::post('/edit-product/{productId}', [SellerController::class, 'updateProduct']);
Route::get('/delete-product/{productId}', [SellerController::class, 'destroyProduct']);

//login regis
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'addLogin']);
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'addRegister']);

Route::middleware('auth')->group(function() {

    Route::get('/logout', [LoginController::class, 'logout']);
    

    Route::middleware('isBuyer')->group(function() {

        // Account
        Route::get('/account', [AccountController::class, 'index'])->name('account');
        Route::prefix('account')->group(function () {
            Route::get('/edit', [AccountController::class, 'showEdit'])->name('showEditAccount');
            Route::post('/edit', [AccountController::class, 'editAccount'])->name('editAccount');
            Route::get('/change-email', [AccountController::class, 'indexEmail'])->name('indexEmail');
            Route::post('/change-email', [AccountController::class, 'changeEmail'])->name('changeEmail');
            Route::get('/change-password', [AccountController::class, 'indexPass'])->name('indexPass');
            Route::post('/change-password', [AccountController::class, 'changePass'])->name('changePass');
        });

        // Address
        Route::resource('/address', AddressController::class);
        Route::get('/address-main/{id}', [AddressController::class, 'main']);

    });

    Route::middleware('isSeller')->group(function() {
        // Account
        Route::resource('/account-seller', AccountController::class);
        Route::get('/change-email', [EmailPasswordController::class, 'indexEmail']);
        Route::get('/change-password', [EmailPasswordController::class, 'indexPass']);
        Route::post('/change-email', [EmailPasswordController::class, 'changeEmail']);
        Route::post('/change-password', [EmailPasswordController::class, 'changePass']);
        
    });

    Route::middleware('isAdmin')->group(function () {

    });
});
