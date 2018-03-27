<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth0Token extends Model
{
	public $timestamps = false;
    protected $fillable = ['access_token','token_type'];
}
