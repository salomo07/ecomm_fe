<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'loginProxy'])->name('login');

Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
// Route::post('/register', [AuthController::class, 'registerProxy'])->name('register');

Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/products', [ProductController::class, 'index'])->name('products')->middleware('role:3');
Route::get('/store', [ProductController::class, 'store'])->name('store');
Route::get('/unauthorized', [AuthController::class, 'unauthorized'])->name('unauthorized');
Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/address', [ProfileController::class, 'address'])->name('profile.address');
