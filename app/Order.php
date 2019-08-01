<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'value', 'delivery'];

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\OrderItem');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function contact()
    {
        return $this->hasOne('App\Contact', 'user_id', 'user_id');
    }
}
