<?php

namespace App\Http\Controllers;

use App\Auth0Token;
use App\Contact;
use App\Events\OrderCreated;
use App\Order;
use Auth0\SDK\API\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
	public function showCheckout(Request $request){
		
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
			$existingContact = Contact::where('user_id', $user['sub'])->first();
			
			if($existingContact->exists()){
				$contact['basic']['fname'] = $existingContact->fname;
				$contact['basic']['lname'] = $existingContact->lname;
				$contact['basic']['telephone'] = $existingContact->telephone;
				$contact['basic']['mobile'] = $existingContact->mobile;
				$contact['basic']['company'] = $existingContact->company;
				$contact['basic']['vat'] = $existingContact->vat;

				$contact['billing'] = [
					'building' => $existingContact->billing_building,
					'address1' => $existingContact->billing_address1,
					'address2' => $existingContact->billing_address2,
					'address3' => $existingContact->billing_address3,
					'address3' => $existingContact->billing_address3,
					'city' => $existingContact->billing_city,
					'province' => $existingContact->billing_province,
					'postal' => $existingContact->billing_postal
				];

				$contact['delivery'] = [
					'building' => $existingContact->delivery_building,
					'address1' => $existingContact->delivery_address1,
					'address2' => $existingContact->delivery_address2,
					'address3' => $existingContact->delivery_address3,
					'address3' => $existingContact->delivery_address3,
					'city' => $existingContact->delivery_city,
					'province' => $existingContact->delivery_province,
					'postal' => $existingContact->delivery_postal
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
			$token = Auth0Token::findOrFail(1);
			$domain = env('AUTH0_MANAGEMENT_DOMAIN');
			$auth0Api = new Management($token->access_token, $domain);

			$usersList = false;
			try {
				$usersList = $auth0Api->usersByEmail->get([ "email" => $checkout['basic']['email'] ]);
			} catch(\Exception $e) {
				report($e);
			}
			if(!$usersList){
				//create New User
				$newUser = [
					"connection" => "Username-Password-Authentication",
					"password" => $checkout['basic']['password'],
					"email" => $checkout['basic']['email'],
					"user_metadata" => [
						'first_name' => $checkout['basic']['fname'],
						'last_name' => $checkout['basic']['lname'],
					],
					"verify_email" => true,
				];
				try {
					$user = $auth0Api->users->create($newUser);
				} catch(\Exception $e) {
					report($e);
				}
			}else{
				$user = $usersList[0];
			}
		}
		if($user){
			$contact = new Contact;
			$contact->user_id = $user['user_id'];
            $contact->fname = $checkout['basic']['fname'];
            $contact->lname = $checkout['basic']['lname'];
            $contact->email = $checkout['basic']['email'];
            $contact->telephone = $checkout['basic']['telephone'];
            $contact->mobile = $checkout['basic']['mobile'];
            $contact->company = $checkout['basic']['company'];
            $contact->vat = $checkout['basic']['vat'];
            $contact->billing_building = $checkout['billing']['building'];
            $contact->billing_address1 = $checkout['billing']['address1'];
            $contact->billing_address2 = $checkout['billing']['address2'];
            $contact->billing_address3 = $checkout['billing']['address3'];
            $contact->billing_city = $checkout['billing']['city'];
            $contact->billing_province = $checkout['billing']['province'];
            $contact->billing_postal = $checkout['billing']['postal'];
            $contact->delivery_building = $checkout['delivery']['building'];
            $contact->delivery_address1 = $checkout['delivery']['address1'];
            $contact->delivery_address2 = $checkout['delivery']['address2'];
            $contact->delivery_address3 = $checkout['delivery']['address3'];
            $contact->delivery_city = $checkout['delivery']['city'];
            $contact->delivery_province = $checkout['delivery']['province'];
            $contact->delivery_postal = $checkout['delivery']['postal'];
            $contact->save();

			$order = new Order;
			$order->user_id = $user['user_id'];
			$order->value = $cart['total'];
			$order->delivery = 1;
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
			$order->load(['items.product','contact']);

			event(new OrderCreated($order));

			//clear cart and checkout info
			$request->session()->forget('cart');
			$request->session()->forget('checkout');

			return redirect('/')->with('status', 'Order Created, please check your inbox for information!');
		}
		return redirect('/checkout')->with('status', 'User creation failed, unable to generate order');
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
