<?php

namespace App\Providers;

use App\News;
use App\Category;
use App\CaseStudy;
use Carbon\Carbon;
use Laravel\Horizon\Horizon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['partial.mainav', 'home'], function ($view) {
            $categories = Category::with(['products', 'allSubCategories.products'])->orderBy('order')->where('parent_id', null)->whereNotIn('id', [11, 12, 13, 14, 15])->get();
            $casestudycategories = Category::has('casestudies')->get();
            $casestudies = CaseStudy::with(['category', 'siteproducts'])->take(3)->latest()->get();
            $news = News::with(['category', 'siteproducts'])->whereDate('publish', '<=', Carbon::now())->get();
            $data = [
                'categories'=>$categories,
                'casestudycategories'=>$casestudycategories,
                'casestudies'=>$casestudies,
                'news'=>$news,
            ];
            $view->with($data);
        });
        view()->composer('partial.cart', function ($view) {
            $view->with('cart', session('cart', []));
        });

        view()->composer('partial.pagetop', function ($view) {
            $isLoggedIn = Auth::check();
            $user = $isLoggedIn ? Auth::user()->getUserInfo() : false;
            $view->with(compact(['isLoggedIn', 'user']));
        });

        Horizon::auth(function ($request) {
            return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \Auth0\Login\Contract\Auth0UserRepository::class,
            \Auth0\Login\Repository\Auth0UserRepository::class
        );
    }
}
