<?php

namespace App\Http\Controllers;

use App\Services\Auth0Management;

class UserController extends Controller
{
    public function __construct(private Auth0Management $auth0) {}

    public function search($user)
    {
        return $this->auth0->usersByEmail($user);
    }
}
