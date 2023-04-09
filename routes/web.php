<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

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

// redirect home to products
Route::get('/', function () {
    return redirect()->route('home');
});

// Product routes
Route::prefix('products')->controller(ProductController::class)->group(function () {
    // get all products
    Route::get('/', 'index')->name('home');
    // get single product
    Route::get('/{product}', 'show')->name('products.show');
});


// route group for cart
Route::prefix('cart')->controller(CartController::class)->group(function () {
    // get cart
    Route::get('/', 'index')->name('cart.index');
});