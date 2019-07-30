<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Category;
use App\Backend\SubCategory;
use Session;
use DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        //return view('setup.SubCaregoryModal');
        return view('setup.SubCaregoryModal', compact('categories'));
    }

    public function changeStatus(Request $request, $id)
    {
        if ( $request->status == 1 ) {
          
         SubCategory::where('sub_categories_id',$id)->update([
                'status' => 0
            ]);
        } 
        else {
          return  SubCategory::where('sub_categories_id',$id)->update([
                'status' => 1
            ]);
        }
          return response()->json(['success' => true, 'message' => 'Modified successfully']);
    }

    public function store(Request $request)
    {
        try {
            $id = Session::get('admin')->user_id;
            DB::beginTransaction();
                $store = SubCategory::insert([
                    'category_id'   => $request->id,
                    'sub_category_name' => $request->subCategoryName,
                    'sub_category_url'  => $request->subCatUrl,
                    'status'        => $request->status,
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

    public function getSubCategoryList()
    {
        $SubCaregoryList = SubCategory::all();
         return view('setup.allSubCategoryList', compact('SubCaregoryList'));
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
         try{
            $id = Session::get('admin')->user_id;
            $update = SubCategory::where('sub_categories_id',$request->id)
                ->update([
                    'name' => $request->name, 
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

    public function destroy($id)
    {
        return SubCategory::where('sub_categories_id',$id)->delete();
    }
}
