<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function subCategoies(){
    	return $this->hasMany('App\Backend\SubCategory', 'category_id', 'category_id');
    }

    public function product(){
    	return $this->hasMany('App\Backend\Product', 'category_id', 'category_id');
    }
  
}
