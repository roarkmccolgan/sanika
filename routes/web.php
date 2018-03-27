<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

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

//Auth::routes();

//Auth0
Route::get('/login', 'Auth0Controller@login');
Route::get('/logout', 'Auth0Controller@logout');
Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', 'ShopController@getHome');
Route::get('/categories/{tree?}', 'ShopController@getProductOrCategory')->where('tree', '(.*)');

Route::get('/checkout', 'CheckoutController@showCheckout');
Route::post('/checkout', 'CheckoutController@Checkout');

Route::get('/productlist', 'ShopController@jsonList');

Route::post('/productfrompdf', 'DataBaseController@productfrompdf');
Route::post('/categoryfrompdf', 'DataBaseController@categoryfrompdf');

Route::get('/testmedia', function(){
	$cat = \App\Category::find(4);
	$cat->addMedia(storage_path('source_images/greywater-100.jpg'))->preservingOriginal()->toMediaCollection('title');
	return $cat->getMedia('title');
	//$cat->clearMediaCollection('title');
	//$cat->getFirstMedia('title')->delete();
	return 'success';
});

Route::get('/user/{user}', 'UserController@search');

Route::prefix('api')->group(function () {
    Route::post('cart', 'CartController@addToCart');
    Route::get('clearcart', 'CartController@clearCart');
    
    Route::post('checkout', 'CheckoutController@saveCheckout');

});