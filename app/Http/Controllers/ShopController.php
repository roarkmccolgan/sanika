<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ShopController extends Controller
{
    public function getHome(){
    	$shop = collect(Config::get('maxrenew.categories'));
    	return view('home',compact('shop'));
    }

    public function getCategories($cat){
    	$category = collect(Config::get('maxrenew.categories.'.$cat));
    	return view('category',compact('category'));
    }
    public function getProduct($cat, $product){
    	$category = collect(Config::get('maxrenew.categories.'.$cat));
    	$product = collect(Config::get('maxrenew.categories.'.$cat.'.products.'.$product));
    	return view('product',compact(['category','product']));
    }
}
