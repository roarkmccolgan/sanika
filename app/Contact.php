<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(\App\Order::class, 'user_id', 'user_id');
    }
}
