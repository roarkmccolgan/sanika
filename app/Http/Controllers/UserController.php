<?php

namespace App\Http\Controllers;

use App\Auth0Token;
use Auth0\SDK\API\Authentication;
use Auth0\SDK\API\Management;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search($user){

    	$token = Auth0Token::findOrFail(1);
		$domain = env('AUTH0_MANAGEMENT_DOMAIN');

		$auth0Api = new Management($token->access_token, $domain);

		$usersList = $auth0Api->usersByEmail->get([ "email" => $user ]);

		return $usersList;
    }
}
