<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Events\OrderCreated;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
	public function showCheckout(){
		$cart = session('cart',false);
		if(!$cart) return redirect('/');

		//Check if user logged in
		$isLoggedIn = Auth::check();
        $user = $isLoggedIn ? Auth::user()->getUserInfo() : false;

        $contact = [];
        if($user){
        	$contact['basic'] = [
        		'email' => $user['email'],
        		'user_id' => $user['sub']
        	];
        	$existingContact = Contact::where('user_id', $user['sub'])->latest();
	        if($existingContact->exists()){
	        	$contact['basic']['fname'] = $contact->fname;
	        	$contact['basic']['lname'] = $contact->lname;
	        	$contact['basic']['telephone'] = $contact->telephone;
	        	$contact['basic']['mobile'] = $contact->mobile;
	        	$contact['basic']['company'] = $contact->company;
	        	$contact['basic']['vat'] = $contact->vat;

	        	$contact['billing'] = [
	        		'billing_building' => $contact['billing_building'],
		            'billing_address1' => $contact['billing_address1'],
		            'billing_address2' => $contact['billing_address2'],
		            'billing_address3' => $contact['billing_address3'],
		            'billing_address3' => $contact['billing_address3'],
		            'billing_city' => $contact['billing_city'],
		            'billing_province' => $contact['billing_province'],
		            'billing_postal' => $contact['billing_postal']
	        	];

	        	$contact['delivery'] = [
	        		'delivery_building' => $contact['delivery_building'],
		            'delivery_address1' => $contact['delivery_address1'],
		            'delivery_address2' => $contact['delivery_address2'],
		            'delivery_address3' => $contact['delivery_address3'],
		            'delivery_address3' => $contact['delivery_address3'],
		            'delivery_city' => $contact['delivery_city'],
		            'delivery_province' => $contact['delivery_province'],
		            'delivery_postal' => $contact['delivery_postal']
	        	];
	        }
	        session(['checkout'=>$contact]);
        }

		\JavaScript::put([
			'cart' => session('cart'),
			'checkout' => session('checkout',false),
		]);

		return view('cart', compact(['cart','checkout']));
	}

	public function checkout(Request $request){

		$cart = session('cart');
		$checkout = session('checkout');
		$isLoggedIn = Auth::check();
        $user = $isLoggedIn ? Auth::user()->getUserInfo() : false;
        if(!$user){
        	
        }

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
