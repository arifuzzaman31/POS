<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\ProductSize;
use App\Backend\Product;
use App\Backend\Size;
use DB;
use Session;

class ProductSizeController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	$sizes = Size::all();
    	return view('setup.productSize', compact('products','sizes'));
    }

    public function store(Request $request)
    {
    	$id = Session::get('admin')->user_id;
    	try {
    		DB::beginTransaction();
		    $stored = ProductSize::insert([
		    		'product_id' => $request->product,
		    		'size_id' => $request->size,
                    'status' => $request->status,
		    		'created_by' => $id
		    	]);
		   	if ($stored) {
		   		DB::commit();
		   			return response()->json(['success' =>true, 'message' => 'Product and size selected']);
		   	} else {
		   		DB::rollback();
		   			return response()->json(['success' =>true, 'message' => 'Product and size not selected']);
		   	}
    		
    	} catch (Exception $e) {
    		DB::rollback();
		   			return response()->json(['success' =>true, 'message' => $e->errorInfo[2]]);
    	}
    }

    public function show()
    {
    	$datas = ProductSize::all();
    		return view('setup.allProductSize', compact('datas'));
    }

    public function changeStatus(Request $request, $id)
    {
       
        if ($request->status == 1) {
        
            ProductSize::where('product_size_id', $id)
                        ->update(['status' => 0]);
        }
        else {
            ProductSize::where('product_size_id', $id)
                        ->update(['status' => 1]);
        }
         return response()->json(['success' => true, 'message' => 'status Modified']);
    }  

    public function destroy($id)
    {
        
       return ProductSize::where('product_size_id',$id)->delete();
  
    }
}
