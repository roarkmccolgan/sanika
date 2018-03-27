<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = ['user_id'];

    public function orders(){
    	return $this->hasMany('App\Order', 'user_id', 'user_id');
    }
}
