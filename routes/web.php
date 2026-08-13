<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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

Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', [ContactController::class, 'SendMessage']);

Route::get('/gallery', [GalleriesController::class, 'index']);
Route::get('/gallery/{gallery}', [GalleriesController::class, 'show']);

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::post('/lead', [LeadController::class, 'NewLead']);

Route::get('/', [ShopController::class, 'getHome']);
Route::get('/categories/{tree?}/products/{product}', [ShopController::class, 'getProduct'])->where('tree', '(.*)');
Route::get('/categories/{tree?}', [ShopController::class, 'getCategory'])->where('tree', '(.*)');
Route::get('/casestudies/{category?}', [CaseStudyController::class, 'getCaseStudies']);
Route::get('/casestudies/{category}/{casestudy}', [CaseStudyController::class, 'getCaseStudy']);
Route::get('/news/{tree?}', [NewsController::class, 'getNewsItem'])->where('tree', '(.*)');

Route::get('/checkout', [CheckoutController::class, 'showCheckout']);
Route::post('/checkout', [CheckoutController::class, 'checkout']);

Route::get('/productlist', [ShopController::class, 'jsonList']);

Route::prefix('api')->group(function () {
    Route::post('cart', [CartController::class, 'addToCart']);
    Route::get('clearcart', [CartController::class, 'clearCart']);

    Route::post('checkout', [CheckoutController::class, 'saveCheckout']);
});
