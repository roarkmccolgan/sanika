<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Category extends Model implements HasMedia
{
	use HasMediaTrait;
	public $timestamps = false;

    protected $fillable = ['name','alias','description','parent_id'];

    public function parent() {
		return $this->belongsTo('App\Category', 'parent_id');
	}

	public function subCategories() {
	    return $this->hasMany('App\Category', 'parent_id');
	}
	public function allSubCategories() {
	    return $this->subCategories()->with('allSubCategories');
	}

	public function products(){
    	return $this->belongsToMany('App\Product');
    }
}
