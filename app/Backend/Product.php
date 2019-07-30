<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    public function category(){
    	return $this->belongsTo('App\Backend\Category', 'category_id', 'category_id');
    }

    public function subcategory(){
    	return $this->belongsTo('App\Backend\SubCategory', 'sub_category_id', 'sub_categories_id');
    }

   public function image(){
        return $this->hasOne('App\Backend\ProductImage', 'product_id','product_id');
    }
    public function images(){
    	return $this->hasMany('App\Backend\ProductImage', 'product_id','product_id');
    }
    
}
