<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $fillable = ['name', 'product_id'];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }
}
