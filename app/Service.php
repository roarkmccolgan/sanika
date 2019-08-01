<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'alias',
        'description',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];

    public function categories()
    {
        return $this->belongsToMany(\App\Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(\App\Product::class, 'package_product', 'package_id', 'product_id')->withPivot('qty');
    }

    public function questions()
    {
        return $this->hasMany(\App\QA::class);
    }
}
