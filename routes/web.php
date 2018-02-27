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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ShopController@getHome');
Route::get('/categories/{category}', 'ShopController@getCategories');
Route::get('/categories/{category}/{product}', 'ShopController@getProduct');

Route::prefix('api')->group(function () {
    Route::post('cart', 'CartController@addToCart');
});