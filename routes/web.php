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


Auth::routes();

Route::get('/register', function() {
    return "Register Feature Not Available Now";
});


Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('product')->middleware('auth')->name('product.')->group(function() {
    Route::get('/', 'ProductController@index')->name('index');
    Route::post('/', 'ProductController@store')->name('store');
    Route::get('/{id}', 'ProductController@edit')->name('edit');
    Route::post('/{id}', 'ProductController@update')->name('update');
    Route::delete('/{id}', 'ProductController@destroy')->name('delete');
});

Route::prefix('order')->middleware('auth')->name('order.')->group(function() {
    Route::get('/', 'OrderController@index')->name('index');
    Route::get('/{id}', 'OrderController@edit')->name('edit');
    Route::delete('/{id}', 'OrderController@destroy')->name('delete');
});

Route::prefix('user')->middleware('auth')->name('user.')->group(function() {
    Route::get('/', 'UserController@index')->name('index');
});

Route::name('frontend.')->group(function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('/{id}', 'FrontendController@order')->name('order');
    Route::post('/{id}', 'FrontendController@store')->name('store');
    Route::get('/finish/{id}', 'FrontendController@finish')->name('finish');
});
