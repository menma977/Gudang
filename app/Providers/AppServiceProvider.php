<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\User;

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

        view()->composer('layouts.admin', function ($view) {
            $user = User::whereIn('role', [2, 3, 4, 5])->get();
            $view->with('users', $user);
        });

        Blade::if('holder', function () {
            return Auth::user() && Auth::user()->role == 0 ? true : false;
        });

        Blade::if('admin', function () {
            return Auth::user() && Auth::user()->role == 1 ? true : false;
        });

        Blade::if('headShed', function () {
            return Auth::user() && Auth::user()->role == 2 ? true : false;
        });

        Blade::if('shed', function () {
            return Auth::user() && Auth::user()->role == 3 ? true : false;
        });

        Blade::if('sales', function () {
            return Auth::user() && Auth::user()->role == 4 ? true : false;
        });

        Blade::if('store', function () {
            return Auth::user() && Auth::user()->role == 5 ? true : false;
        });
    }
}
