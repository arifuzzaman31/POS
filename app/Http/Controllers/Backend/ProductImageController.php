<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\ProductImage;
use App\Backend\Product;
use Session;
use DB;

class ProductImageController extends Controller
{
    public function index()
    {
    	$Products = Product::all();
    	return view('setup.ProductImage', compact('Products'));
    }

    public function store(Request $request)
    {
       $id = Session::get('admin')->user_id;
    	try {
    		DB::beginTransaction();
    	$insertid = ProductImage::insertGetId([
    		'product_id' => $request->name,
            'status' => $request->status,
            'created_by' => $id
    		
    	]);
    		if ($request->hasFile('file')) {
    			$image = $request->file('file');
    			$imageName = time().'.'.$image->getClientOriginalExtension();
    			$image->move(public_path('images/product-image'),$imageName);

    			ProductImage::where('product_image_id', $insertid)
	      	  			->update([
	      	  				'image_path' => $imageName
	      	  			]);
    		}
    			DB::commit();
    	return response()->json(['success' =>true, 'message' => 'Product Image Added']);
    		    		
    	} catch (Exception $e) {
    		DB::rollback();
    		return response()->json(['success' =>true, 'message' => $e->errorInfo[2]]);
    	}
    	
    	return view('setup.ProductImage', compact('Products'));
    }

    public function imageList()
    {
    	$images = ProductImage::all();
    		return view('setup.allProductImage', compact('images'));
    }

    public function changeStatus(Request $request, $id)
    {
       
        if ($request->status == 1) {
        
            ProductImage::where('product_image_id', $id)
                        ->update(['status' => 0]);
        }
        else {
            ProductImage::where('product_image_id', $id)
                        ->update(['status' => 1]);
        }
         return response()->json(['success' => true, 'message' => 'status Modified']);
    }  

    public function destroy($id)
    {
        
       return ProductImage::where('product_image_id',$id)->delete();
  
    }
}
