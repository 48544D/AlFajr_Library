<?php

namespace App\Providers;

use App\Models\category;
use App\Models\subCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NavbarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('components/navbar', function ($view) {
            // $subcategories = subCategory::all();
            // $categories = category::with('subcategories')->get();
            // join  categories and subcategories
            $categories = category::with('subCategories')->get();
            // dd($categories);
            $view->with('categories', $categories);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
