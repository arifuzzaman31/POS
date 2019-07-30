<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'product_sizes';

    public function product(){
    	return $this->belongsTo('App\Backend\Product','product_id','product_id');
    }
    
    public function size(){
    	return $this->belongsTo('App\Backend\Size','size_id','size_id');
    }
}
