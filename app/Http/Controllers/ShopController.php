<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
   
    public function getHome(Request $request){
        //DB::connection()->enableQueryLog();
        //$cats = Category::with(['products:alias,name','allSubCategories.products:alias,name'])->where('parent_id',null)->get();
        //return DB::getQueryLog();
        //return $cats;
    	//$shop = collect(Config::get('maxrenew.categories'));
      
        \JavaScript::put([
            'cart' => session('cart'),
        ]);
        
    	return view('home',compact(['cart']));
    }

    public function getCategories($cat){
    	$category = collect(Config::get('maxrenew.categories.'.$cat));
    	return view('category',compact('category'));
    }
    /*public function getProduct($cat, $product){
        $product = Product::where('alias',$product)->get();
        return view('product',compact(['product']));
    }*/
    public function getCategory(Request $request, $tree = null){
        //return session('cart');
        if($tree){
            $path = explode('/', $tree);
            $last = last($path);
            $category = Category::with('products')->where('alias',$last)->firstOrFail();
            return view('category',compact('category'));
        }
        abort(404);
    }
    public function getProduct(Request $request, $tree = null, $product){
        //return session('cart');
        if($tree){
            $path = explode('/', $tree);
            $last = last($path);
            $product = Product::with('products')->where('alias',$product)->firstOrFail();
            $category = Category::with('products')->where('alias',$last)->firstOrFail();
            //return $product;
            \JavaScript::put([
                'product' => $product,
                'cart' => session('cart'),
            ]);
            return view('product',compact(['product','category']));
        }
        abort(404);
    }

    public function jsonList(){
        $database = Config::get('maxrenew');
    	$products = collect($database)->map(function ($item, $key) {
            return collect($item)->map(function($category, $catKey){
                return collect($category['products'])->map(function ($product, $prodKey) use($catKey){
                    return collect($product)->only(['name','alias','description'])->put('url',env('APP_URL').'/categories/'.$catKey.'/'.$prodKey);
                });
            });
        })->flatten(2);
        return response()->json($products);
    }
}
