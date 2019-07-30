<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Controller;
use App\Backend\Slider;
use App\Backend\ProductSlider;
use DB;
use Session;

class SliderController extends Controller
{
    public function index()
    {
    	return view('setup.slider');
    }

   public function store(Request $request)
    {
       $id = Session::get('admin')->user_id;
    	try {
    		DB::beginTransaction();
    		$insertid = Slider::insertGetId([
    				'slider_title' => $request->title,
    				'status'	=> $request->status,
                    'created_by' => $id
    			]);
    		if ($request->file('file')) {
	   			$image = $request->file('file');
	     		$new_name = time() . '.' . $image->getClientOriginalExtension();
	      		$image->move(public_path('images/slider'), $new_name);
	      	  Slider::where('slider_id', $insertid)
	      	  			->update([
	      	  				'slider_image_path' => $new_name
	      	  			]);

            }
	      	  		DB::commit();
            return response()->json(['success' =>true, 'message' => 'Slider Added']);
    		
    	} catch (Exception $e) {
				DB::rollBack();
            return response()->json(['success' =>true, 'message' => 'Some error']);    		
    	}
    }

    public function allSlider()
    {
        // return 'hi';
       $sliders = Slider::all();

       return view('setup.allSlider', compact('sliders'));
    }

    public function deleteSlider($id)
    {
         //return response()->json();
        return Slider::where('slider_id',$id)->delete();
       
    }

    public function sliderStatus(Request $request, $id)
    {
         //return response()->json(['status' => 0]);
        if ( $request->status == 1 ) {
          
            Slider::where('slider_id',$id)->update([
                'status' => 0
            ]);
        } 
        else {
           Slider::where('slider_id',$id)->update([
                'status' => 1
            ]);
          
        }
        return response()->json(['success' => true, 'message' => 'Change Slider status']);
    }

    public function addToProductSlider(Request $request)
    {
        $id = Session::get('admin')->user_id;
        ProductSlider::insert([
            'product_id' => $request->id,
            'created_by' => $id

        ]);
        return response()->json(['message' => 'Slider Added to Product Slider']);
    }

    public function getProductSlider()
    {
        $all_ProductSlider = ProductSlider::all();
        return view('setup.allProductSlider',compact('all_ProductSlider'));
    }

    public function ProductSliderStatus(Request $request, $id)
    {
        if ($request->status == 1) {
            ProductSlider::where('product_slider_id', $id)
                ->update([
                    'status' => 0
                ]);
            return response()->json(['success' => false, 'message' => 'Deactivated']);
        }
        else {
            ProductSlider::where('product_slider_id', $id)
                ->update([
                    'status' => 1
                ]);
            return response()->json(['success' => true, 'message' => 'Activated']);
        }
    }

     public function destroyProductSlider($id)
    {
        return ProductSlider::where('product_slider_id',$id)->delete();
    }
}
