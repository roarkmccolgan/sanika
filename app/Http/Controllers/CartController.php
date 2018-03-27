<?php

namespace App\Http\Controllers;

use Akaunting\Money\Money;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function addToCart(Request $request){
		$product = Product::where('sku', $request->input('sku'))->firstOrFail();

		$item = session('cart.items.'.$product->sku,[]);
		
		$item['qty'] = empty($item) ? $request->input('qty',1): $item['qty']+$request->input('qty',1);
		$item['installation'] = $request->input('install');
		$item['price_install'] = $request->input('install') ? $product->price_install:0;
		$item['display_price_install'] = money($item['price_install'],'ZAR')->render();
		$item['price'] = $product->price;
		$item['display_price'] = money(($product->price+$item['price_install'])*$item['qty'],'ZAR')->render();
		$item['sku'] = $product->sku;
		$item['id'] = $product->id;
		$item['name'] = $product->name;
		$item['strapline'] = $product->strapline;
		$item['path'] = $product->path;
		$item['strapline'] = $product->strapline;

		$request->session()->put('cart.items.'.$product->sku,$item);

		$request->session()->put('cart.total',$this->cartTotal());
		$request->session()->put('cart.display_total',money(session('cart.total'),'ZAR')->render());
		$data = [
			'cart' => session('cart'),
		];
		if($request->wantsJson()){
			return collect($data);
		}
	}

	public function removeFromCart(Request $request){
		$message = 'Item does not exist';
		$product = Product::where('sku', $request->input('sku'))->firstOrFail();
		$item = session('cart.items.'.$product->sku,false);
		if($item){
			$request->session()->forget('cart.items.'.$product->sku);
			$message = 'Item/s removed';
		}
		$data = [
			'message' => $mesage
		];
		if($request->wantsJson()){
			return collect($data);
		}
		$request->session()->flash('message', $message);
		$cart = session('cart');
		\JavaScript::put([
            'cart' => session('cart'),
        ]);

		return view('cart', compact('cart'));
	}
	public function clearCart(Request $request){
		$request->session()->forget('cart');
		if($request->wantsJson()){
			return 'success';
		}
	}

	private function cartTotal(){
		return collect(session('cart.items'))->map(function($product){
			return collect($product)->only(['price','price_install','qty']);
		})->reduce(function ($carry, $item) {
		    return $carry + (($item['price']+$item['price_install'])*$item['qty']);
		});
	}
}
