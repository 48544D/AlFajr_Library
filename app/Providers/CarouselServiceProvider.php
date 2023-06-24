<?php

namespace App\Providers;

use App\Models\carousel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CarouselServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('components/carousel', function ($view) {
            $slides = carousel::all();
            $view->with('slides', $slides);
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
