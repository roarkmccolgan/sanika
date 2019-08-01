<?php

namespace App\Http\Controllers;

use App\Auth0Token;
use Illuminate\Http\Request;
use Auth0\SDK\API\Management;
use Auth0\SDK\API\Authentication;

class UserController extends Controller
{
    public function search($user)
    {
        $token = Auth0Token::findOrFail(1);
        $domain = env('AUTH0_MANAGEMENT_DOMAIN');

        $auth0Api = new Management($token->access_token, $domain);

        $usersList = $auth0Api->usersByEmail->get(['email' => $user]);

        return $usersList;
    }
}
