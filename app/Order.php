<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'value', 'delivery'];

    public function products()
    {
        return $this->hasManyThrough(Product::class, OrderItem::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class, 'user_id', 'user_id');
    }
}
