<?php

use App\CaseStudy;
use App\Category;
use App\News;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
Route::post('/contact', 'ContactController@SendMessage');

Route::get('/gallery', 'GalleriesController@index');
Route::get('/gallery/{gallery}', 'GalleriesController@show');

Route::get('/search', 'SearchController@index');

Route::post('/lead', 'LeadController@NewLead');

Route::get('/', 'ShopController@getHome');
Route::get('/categories/{tree?}/products/{product}', 'ShopController@getProduct')->where('tree', '(.*)');
Route::get('/categories/{tree?}', 'ShopController@getCategory')->where('tree', '(.*)');
Route::get('/casestudies/{tree?}', 'CaseStudyController@getCaseStudy')->where('tree', '(.*)');
Route::get('/news/{tree?}', 'NewsController@getNewsItem')->where('tree', '(.*)');

Route::get('/checkout', 'CheckoutController@showCheckout');
Route::post('/checkout', 'CheckoutController@Checkout');

Route::get('/productlist', 'ShopController@jsonList');

Route::post('/productfrompdf', 'DataBaseController@productfrompdf');
Route::post('/categoryfrompdf', 'DataBaseController@categoryfrompdf');
Route::post('/casestudyfrompdf', 'DataBaseController@casestudyfrompdf');
Route::post('/newsfrompdf', 'DataBaseController@newsfrompdf');
Route::post('/galleryfrompdf', 'DataBaseController@galleryfrompdf');

Route::get('/media/category/{category}/{file}', function($category, $file){
	$cat = \App\Category::find($category);
	$cat->addMedia(storage_path('source_images/'.$file))->preservingOriginal()->toMediaCollection('title');
	
	return 'success';
});
Route::get('/media/product/{product}', function(Request $request, $product){
	if($request->query('file')){
		$prod = \App\Product::find($product);
		$prod->addMediaFromUrl($request->query('file'))->toMediaCollection('title');
		
		return 'success';
	}
	abort(404);
});

Route::get('/media/casestudy/{casestudy}/{file}', function($casestudy, $file){
	$casestudy = \App\CaseStudy::find($casestudy);
	$casestudy->addMedia(storage_path('source_images/'.$file))->preservingOriginal()->toMediaCollection('title');
	
	return 'success';
});

Route::get('/media/news/{newsitem}/{file}', function($newsitem, $file){
	$newsitem = \App\News::find($newsitem);
	$newsitem->addMedia(storage_path('source_images/'.$file))->preservingOriginal()->toMediaCollection('title');
	
	return 'success';
});

Route::get('/listcategories', function(){
	$categories = Category::with(['products','allSubCategories.products'])->orderBy('order')->where('parent_id',null)->get();
	return $categories;
});

Route::get('/testmail', function(){
	$order = Order::with(['items','contact'])->find(11);
	
	/*Mail::to('roarkmccolgan@gmail.com')
	->send(new App\Mail\SendOrder($order));*/

    return (new App\Mail\SendOrder($order))->render();
});

Route::get('/user/{user}', 'UserController@search');

Route::prefix('api')->group(function () {
    Route::post('cart', 'CartController@addToCart');
    Route::get('clearcart', 'CartController@clearCart');
    
    Route::post('checkout', 'CheckoutController@saveCheckout');

});