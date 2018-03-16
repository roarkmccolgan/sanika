<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
