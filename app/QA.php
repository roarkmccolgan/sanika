<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    protected $fillable = ['comment','email','name'];

    public function product(){
    	return $this->belongsTo('\App\Product');
    }

    public function answers() {
	    return $this->hasMany('App\QA', 'parent_id');
	}
}
