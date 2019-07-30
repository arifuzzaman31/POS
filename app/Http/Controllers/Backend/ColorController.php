<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Color;
use Session;
use DB;

class ColorController extends Controller
{
    public function index()
    {
        return view('setup.ColorModal');
    }

    public function getColorList()
    {
       $colors = Color::all();
        return view('setup.allColor', compact('colors'));
    }

    public function store(Request $request)
    {
       
        try {
            $id = Session::get('admin')->user_id;
            DB::beginTransaction();
              $stored = Color::insert([
                    'color_name' => $request->name,
                    'status'    => $request->status,
                    'created_by' => $id
               ]);
              if ($stored) {
                    DB::commit();  
              } else {
                    DB::rollback();
              }

        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function changeColorStatus(Request $request, $id)
    {
        if ($request->status == 1) {
            Color::where('color_id', $id)
                ->update([
                    'status' => 0
                ]);
            return response()->json(['success' => false, 'message' => 'Deactivated']);
        }
        else {
            Color::where('color_id', $id)
                ->update([
                    'status' => 1
                ]);
            return response()->json(['success' => true, 'message' => 'Activated']);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
    try {
            $id = Session::get('admin')->user_id;
            $update = Color::where('color_id', $request->id)
                      ->update([
                            'color_name' => $request->color,
                            'updated_by' => $id
                      ]);
                if ($update) {
                    return response()->json(['success' => true, 'message' => 'Color name Updated']);
                } else {
                    return response()->json(['success' => true, 'message' => 'Color name not change']);
                }
        } catch (Exception $e) {
        return response()->json(['success' => true, 'message' => $e->errorInfo[2]]);
        }
    }

    public function destroy($id)
    {
        return Color::where('color_id',$id)->delete();
    }
}
