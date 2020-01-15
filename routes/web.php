<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::guest()) {
        return redirect()->route('login');
    } else {
        return redirect()->route('home');
    }
});

// Auth::routes();
Auth::routes(['register' => false, 'reset' => false]);

Route::middleware('validate')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // 0 : pemilik, 1 : admin, 2 : kepala gudang, 3 : user Gudang, 4 : sales, 5 : store

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', 'UserController@index')->name('index')->middleware('auth', 'role:0|1');
        Route::get('/create', 'UserController@create')->name('create')->middleware('auth', 'role:0|1');
        Route::post('/store', 'UserController@store')->name('store')->middleware('auth', 'role:0|1');
        Route::get('/show', 'UserController@show')->name('show')->middleware('auth');
        Route::get('/edit/{id}', 'UserController@edit')->name('edit')->middleware('auth', 'role:0|1');
        Route::post('/update/{id}', 'UserController@update')->name('update')->middleware('auth', 'role:0|1');
        Route::get('/delete', 'UserController@delete')->name('delete')->middleware('auth', 'role:0|1');
        Route::post('/destroy', 'UserController@destroy')->name('destroy')->middleware('auth', 'role:0|1');
    });

    Route::group(['prefix' => 'route', 'as' => 'route.'], function () {
        Route::get('/', 'RouteController@index')->name('index')->middleware('auth', 'role:0|1|4');
        Route::get('/create', 'RouteController@create')->name('create')->middleware('auth', 'role:0|1');
        Route::post('/store', 'RouteController@store')->name('store')->middleware('auth', 'role:0|1');
        Route::get('/show', 'RouteController@show')->name('show')->middleware('auth');
        Route::get('/edit/{id}', 'RouteController@edit')->name('edit')->middleware('auth', 'role:0|1');
        Route::post('/update/{id}', 'RouteController@update')->name('update')->middleware('auth', 'role:0|1');
    });

    Route::group(['prefix' => 'store', 'as' => 'store.'], function () {
        Route::get('/', 'StoreController@index')->name('index')->middleware('auth', 'role:0|1');
        Route::get('/create', 'StoreController@create')->name('create')->middleware('auth', 'role:0|1');
        Route::post('/store', 'StoreController@store')->name('store')->middleware('auth', 'role:0|1');
        Route::get('/show', 'StoreController@show')->name('show')->middleware('auth');
        Route::get('/edit/{id}', 'StoreController@edit')->name('edit')->middleware('auth', 'role:0|1');
        Route::post('/update/{id}', 'StoreController@update')->name('update')->middleware('auth', 'role:0|1');
    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', 'CategoryController@index')->name('index')->middleware('auth', 'role:0|1');
        Route::get('/create', 'CategoryController@create')->name('create')->middleware('auth', 'role:0|1');
        Route::post('/store', 'CategoryController@store')->name('store')->middleware('auth', 'role:0|1');
        Route::get('/show', 'CategoryController@show')->name('show')->middleware('auth');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit')->middleware('auth', 'role:0|1');
        Route::post('/update/{id}', 'CategoryController@update')->name('update')->middleware('auth', 'role:0|1');
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', 'ProductController@index')->name('index')->middleware('auth', 'role:0|1|2|3');
        Route::get('/create', 'ProductController@create')->name('create')->middleware('auth', 'role:0|1|2|3');
        Route::post('/store', 'ProductController@store')->name('store')->middleware('auth', 'role:0|1|2|3');
        Route::get('/show', 'ProductController@show')->name('show')->middleware('auth');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit')->middleware('auth', 'role:0|1|2|3');
        Route::post('/update/{id}', 'ProductController@update')->name('update')->middleware('auth', 'role:0|1|2|3');
    });
});
