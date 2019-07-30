<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
	// protected $primaryKey = 'category_id';
    public function categoryName(){
    	return $this->belongsTo('App\Backend\Category', 'category_id', 'category_id');
    }
}
