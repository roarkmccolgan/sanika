<?php

namespace App\Http\Controllers;

use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNewsItem(Request $request, $tree = null){
        if($tree){
            $path = explode('/', $tree);
            $last = last($path);
            $newsitem = News::with('category')->where('alias',$last)->firstOrFail();
            $news =  News::with('category')->where('id','!=',$newsitem->id)->whereDate('publish', '<=', Carbon::now())->get();
            return view('newsitem',compact(['newsitem','news']));
        }
        $newsitems = News::with('category')->whereDate('publish', '<=', Carbon::now())->get();
        return view('news',compact(['newsitems']));
    }
    public function getNews(Request $request, $tree = null){
        $newsitem = News::with('category')->get();
        return view('news',compact(['newsitem']));
    }
}
