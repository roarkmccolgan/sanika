<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
	public function showCheckout(){
		$cart = session('cart',false);
		if(!$cart) return redirect('/');
		$checkout = session('checkout',false);
		\JavaScript::put([
			'cart' => session('cart'),
			'checkout' => session('checkout'),
		]);

		return view('cart', compact(['cart','checkout']));
	}

	public function checkout(Request $request){

		$cart = session('cart');
		$checkout = session('checkout');

		$user_id = '12345';
		$delivery = 1;

		$order = new Order;
		$order->user_id = $user_id;
		$order->value = $cart['total'];
		$order->delivery = $delivery;
		$order->save();

		$orderItems = [];
		foreach ($cart['items'] as $sku => $item) {
			$orderItems[]=[
				'product_id' => $item['id'],
				'qty' => $item['qty'],
				'installation' => $item['installation']
			];
		}
		
		$order->items()->createMany($orderItems);
		$order->load('items.product');

		event(new OrderCreated($order));

		return 'Order Created';
	}

	public function saveCheckout(Request $request){
    	//basic
    	//billing
    	//delivery
		$request->session()->put('checkout.basic', $request->input('basic'));
		$request->session()->put('checkout.billing', $request->input('billing'));
		$request->session()->put('checkout.delivery', $request->input('delivery'));
		$request->session()->put('checkout.same', $request->input('same'));

		$data = [
			'checkout' => session('checkout'),
		];
		if($request->wantsJson()){
			return collect($data);
		}
	}


}
