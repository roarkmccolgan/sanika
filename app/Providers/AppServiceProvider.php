<?php

namespace App\Providers;

use App\CaseStudy;
use App\Category;
use App\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['partial.mainav', 'home'], function ($view) {
            $categories = Category::with(['products', 'allSubCategories.products'])->orderBy('order')->where('parent_id', null)->whereNotIn('id', [11, 12, 13, 14, 15])->get();
            $casestudycategories = Category::has('casestudies')->get();
            $casestudies = CaseStudy::with(['category', 'siteproducts'])->take(3)->latest()->get();
            $news = News::with(['category', 'siteproducts'])->orderBy('publish', 'desc')->whereDate('publish', '<=', Carbon::now())->limit(1)->get();
            $newsCategories = Category::whereHas('news')->get();
            $data = [
                'categories' => $categories,
                'casestudycategories' => $casestudycategories,
                'casestudies' => $casestudies,
                'news' => $news,
                'newscategories' => $newsCategories,
            ];
            $view->with($data);
        });
        view()->composer('partial.cart', function ($view) {
            $view->with('cart', session('cart', []));
        });

        view()->composer('partial.pagetop', function ($view) {
            $isLoggedIn = Auth::check();
            $user = $isLoggedIn ? Auth::user() : false;
            $view->with(compact(['isLoggedIn', 'user']));
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
