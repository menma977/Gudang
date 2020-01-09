<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.include.header', function ($view) {
            $view->with('amount', 5);
        });

        Blade::if('holder', function () {
            return Auth::user() && Auth::user()->rule == 0 ? true : false;
        });

        Blade::if('admin', function () {
            return Auth::user() && Auth::user()->rule == 1 ? true : false;
        });

        Blade::if('headShed', function () {
            return Auth::user() && Auth::user()->rule == 2 ? true : false;
        });

        Blade::if('shed', function () {
            return Auth::user() && Auth::user()->rule == 3 ? true : false;
        });

        Blade::if('sales', function () {
            return Auth::user() && Auth::user()->rule == 4 ? true : false;
        });

        Blade::if('store', function () {
            return Auth::user() && Auth::user()->rule == 5 ? true : false;
        });
    }
}
