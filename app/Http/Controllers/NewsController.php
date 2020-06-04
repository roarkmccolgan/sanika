<?php

namespace App\Http\Controllers;

use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNewsItem(Request $request, $tree = null)
    {
        if ($tree) {
            $path = explode('/', $tree);
            if(count($path) > 1){
                $last = last($path);
                $newsitem = News::with('category')->where('alias', $last)->firstOrFail();
                $news = News::with('category')->where('id', '!=', $newsitem->id)->whereDate('publish', '<=', Carbon::now())->latest()->limit(5)->get();
                return view('newsitem', compact(['newsitem', 'news']));
            }
            $newsitems = News::whereHas('category', function($query) use($path){
                $query->where('alias', last($path));
            })->whereDate('publish', '<=', Carbon::now())->latest()->paginate(6);
            return view('news', ['newsitems' => $newsitems, 'category' => $newsitems->first()->category->name]);
        }
        
        $newsitems = News::with('category')->whereDate('publish', '<=', Carbon::now())->latest()->paginate(6);

        return view('news', compact(['newsitems']));
    }

    public function getNews(Request $request, $tree = null)
    {
        $newsitem = News::with('category')->latest()->get();

        return view('news', compact(['newsitem']));
    }
}
