<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Brand;
use Session;
use DB;

class BrandController extends Controller
{

    public function index()
    {
        return view('setup.brandModal');
    }

    public function getBrandList()
    {
        $brandList = Brand::all();
        return view('setup.allBrand', compact('brandList'));
    }

    public function destroy($id)
    {
        return Brand::where('brand_id',$id)->delete();
    	
    }

    public function store(Request $request)
    {
        $id = Session::get('admin')->user_id;
    	try {
    		DB::beginTransaction();
		    	Brand::insert([
		    		'brand_name' => $request->brandName,
		    		'url'        => $request->url,
                    'status'     => $request->status,
                    'created_by' => $id
		    	]);
		    	DB::commit();
    		return response()->json(['status' => 'inserted successfully']);
    	} catch (Exception $e) {
    		DB::rollback();
    		return response()->json(['error' => 'some error occered']);
    	}
    }

    public function update(Request $request)
    {
        $id = Session::get('admin')->user_id;
        try{
            $update = Brand::where('brand_id',$request->id)
                ->update([
                    'brand_name' => $request->name, 
                    'url' => $request->url,
                    'updated_by' => $id
                ]);
            if($update){
                return response()->json(['success' => true, 'message' => 'Update Successfull']);
            }else{
                return response()->json(['error' => true, 'message' => 'Update Successfull']);
            }
        }catch(\Exception $e){
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);

        }
        
    }

    public function changeStatus(Request $request, $id)
    {
        if ($request->status == 1) {
        
            Brand::where('brand_id', $id)
                        ->update(['status' => 0]);
        }
        else {
            Brand::where('brand_id', $id)
                        ->update(['status' => 1]);
        }
         return response()->json(['success' => true, 'message' => 'status Modified']);
    }
}
