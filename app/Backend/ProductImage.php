<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    // protected $primaryKey = 'product_id';

    public function product(){
    	return $this->belongsTo('App\Backend\Product','product_id','product_id');
    }
}
