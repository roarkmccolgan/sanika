<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    protected $fillable = ['comment', 'email', 'name'];

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }

    public function service()
    {
        return $this->belongsTo(\App\Service::class);
    }

    public function answers()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
