<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Providers\NavbarServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
 public function register()
    {
        $this->app->register(NavbarServiceProvider::class);
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // set default string length
        Schema::defaultStringLength(191);

        // boostrap pagination
        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}
