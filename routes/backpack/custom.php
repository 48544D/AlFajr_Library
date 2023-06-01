<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('sub-category', 'SubCategoryCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('clients', 'ClientsCrudController');
    Route::crud('promotions', 'PromotionsCrudController');
    Route::crud('mylists', 'MylistsCrudController');
    Route::get('mylists/{id}/download', 'MylistsCrudController@download');
    Route::crud('order-details', 'OrderDetailsCrudController');
    Route::get('order/{id}/details', 'OrderCrudController@details');
    //promotion from products to promotions
    Route::get('product/{id}/promotion', 'ProductCrudController@promotion');
    Route::get('order/{id}/valider', 'OrderCrudController@valider');
    //route for CreateWithId
   // Route::get('promotions/CreateWithId', 'PromotionsCrudController@CreateWithId');
    //download route
    //Route::get('download/{id}', 'MylistsCrudController@download')->name('download');
    //Route::get('/mylists/download/{id}', 'MylistsCrudController@download')->name('download');
}); // this should be the absolute last line of this file