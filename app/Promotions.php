<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Products');
    }
}
