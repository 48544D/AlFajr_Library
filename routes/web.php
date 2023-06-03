<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MalisteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SubcategoryController;
use App\Models\control;

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
    if (control::first()->PanierActif == 0) {
        Route::get('/', function () {
            return redirect()->route('home')->with('message', 'Panier désactivé !');
        })->name('cart.index');
    } else {
        // get cart
        Route::get('/', 'index')->name('cart.index');
    }
});

// route group for maliste
Route::prefix('maliste')->controller(MalisteController::class)->group(function () {
    if (control::first()->MaListeActive == 0) {
        Route::get('/', function () {
            return redirect()->route('home')->with('message', 'Ma liste désactivé !');
        })->name('maliste.index');
    } else {
        // get maliste
        Route::get('/', 'index')->name('maliste.index');
        // store
        Route::post('/', 'store')->name('maliste.store');
    }
});

// route group for subcategories
Route::prefix('subcategories')->controller(SubcategoryController::class)->group(function () {
    // get subcategory
    Route::get('/{subCategory}', 'show')->name('subcategories.show');
});

// route group for promotions
Route::prefix('promotions')->controller(PromotionController::class)->group(function () {
    // promotion index
    Route::get('/', 'index')->name('promotions.index');
});

// route group for commande
Route::prefix('commande')->controller(CommandeController::class)->group(function () {
    if (control::first()->PanierActif == 0) {
        Route::get('/', function () {
            return redirect()->route('home')->with('message', 'Panier désactivée !');
        })->name('commande.index');
    } else {
        // commande index
        Route::get('/', 'index')->name('commande.index');
    
        // commande store
        Route::post('/', 'store')->name('commande.store');

        // commande success
        Route::get('/success', function () {
            $ref = session('ref');
            return view('commande.success', compact('ref'));
        })->name('commande.success');
    }
});