<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Size;
use Session;
use DB;

class SizeController extends Controller
{
    public function index()
    {
    	return view('setup.productSizeModal');
    }

    public function store(Request $request)
    {   
        $id = Session::get('admin')->user_id;
    	try {
    		DB::beginTransaction();

    		Size::insert([
    			'size_name'	=> $request->name,
    			'status'	=> $request->status,
                'created_by' => $id
    		]);
    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollback();
    	}
    	
    }

    public function getSizeList()
    {
    	$sizes = Size::all();
    	return view('setup.allSize', compact('sizes'));
    }

    public function changeSizeStatus(Request $request, $id)
    {
        if ($request->status == 1) {
            Size::where('size_id', $id)
                ->update([
                    'status' => 0
                ]);
            return response()->json(['success' => 'deactivated']);
        }
        else {
            Size::where('size_id', $id)
                ->update([
                    'status' => 1
                ]);
            return response()->json(['success' => 'activated']);
        }
    }

    public function update(Request $request)
    {
        $id = Session::get('admin')->user_id;
        try {
            $update = Size::where('size_id', $request->id)
                      ->update([
                            'size_name' => $request->size,
                            'updated_by' => $id
                      ]);
                if ($update) {
                    return response()->json(['success' => true, 'message' => 'size name Updated']);
                } else {
                    return response()->json(['success' => true, 'message' => 'size name not change']);
                }
        } catch (Exception $e) {
            return response()->json(['success' => true, 'message' => $e->errorInfo[2]]);
        }
    }

    public function destroy($id)
    {
    	return Size::where('size_id',$id)->delete();
    }
}
