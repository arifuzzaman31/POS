<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Category;
use Session;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('setup.categoryModal');
    }

    public function store(Request $request)
    {
    	$id = Session::get('admin')->user_id;
    	try {
    		DB::beginTransaction();
    			$store = Category::insert([
    				'category_name' => $request->category_name,
    				'url' 			=> $request->url,
    				'status' 		=> $request->status,
                    'created_by'    => $id
    			]);
    			if ($store) {
    				DB::commit();
    				return response()->json(['success' => true, 'message' => 'Added successfully']);
    			}
    			else{
    				DB::rollback();
    				return response()->json(['success' => true, 'message' => 'Here some error']);
    			}
    		
    	} catch (Exception $e) {
    		return response()->json(['success' => true, 'message' => $e->errorInfo[2]]);
    	}
    	
    }

    public function listCategory()
    {
       $categories = Category::all();

        return view('setup.allCategory',compact('categories'));
    }  

    public function changeCategoryStatus(Request $request, $id)
    {
        //return 'Hi';
        if ($request->status == 1) {
        
            Category::where('category_id', $id)
                        ->update(['status' => 0]);
        }
        else {
            Category::where('category_id', $id)
                        ->update(['status' => 1]);
        }
         return response()->json(['success' => true, 'message' => 'status Modified']);
    }  

    public function DeleteCategory($category_id)
    {
        
       return Category::where('category_id',$category_id)->delete();
  
    }

    public function saveUpdateCategory(Request $request)
    {
       
        $id = Session::get('admin')->user_id;
        try{
            $update = Category::where('category_id',$request->category_id)
                ->update([
                    'category_name' => $request->category_name, 
                    'url' => $request->category_url,
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

    public function getSingleCategory($id)
    {
        // setup.editCategory
        $category_info = Category::where('category_id',$id)->first();
    
        return view('setup.editCategory',compact('category_info'));
    }
}
