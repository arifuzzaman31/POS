<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductSlider extends Model
{
    protected $table = 'product_sliders';

    public function slider()
    {
    	return $this->belongsTo('App\Backend\Slider','product_id', 'slider_id');
    }
}
