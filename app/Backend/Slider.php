<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    public function productSlider(){
    	return $this->hasOne('App\Backend\ProductSlider','product_id','product_id');
    }
}
