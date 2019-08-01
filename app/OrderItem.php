<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['product_id', 'qty', 'installation'];

    public function order()
    {
        return $this->belongsTo(\App\Order::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }
}
