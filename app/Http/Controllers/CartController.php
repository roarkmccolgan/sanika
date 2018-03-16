<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
	if($request->session->has('cart.'.$request->input('sku'))){

    	}

    	if($request->ajax()){
            return "AJAX";
        }
    }
}
