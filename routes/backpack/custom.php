<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin;
// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
/*Route::group([
    'middleware' => 'web',
    'prefix' => config('backpack.base.route_prefix')
], function () {
    Route::namespace('Backpack\CRUD\app\Http\Controllers\Auth')->group(function () {
        //Route::get('login', 'LoginController@showLoginForm')->name('backpack.auth.login');
        Route::get('logout', 'LoginController@logout');
        Route::get('register', 'RegisterController@showRegistrationForm')->name('backpack.auth.register');
        Route::post('register', 'RegisterController@register');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('backpack.auth.password.reset');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('backpack.auth.password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('backpack.auth.password.reset.post');


    });
    Route::namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('login', 'CustomAuthController@showLoginForm')->name('backpack.auth.login');
        Route::post('login','CustomAuthController@login');
        
    });
*/
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
    Route::crud('client', 'ClientCrudController');
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
    Route::crud('control', 'ControlCrudController');
}); // this should be the absolute last line of this file