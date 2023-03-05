<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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
    return view('index', ['products' => \App\Models\Product::all()]);
});

// route group for cart
Route::prefix('cart')->controller(CartController::class)->group(function () {
    // get cart
    // Route::get('/', 'index')->name('cart.index');
    // add to cart
    Route::post('/', 'store')->name('cart.store');
    // update cart
    // Route::delete('/', 'destroy')->name('cart.delete');
});