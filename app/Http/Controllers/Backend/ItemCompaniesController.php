<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\ItemCompanies;
use DB;

class ItemCompaniesController extends Controller
{
   public function index()
   {
   	return view('setup.itemCompanyModal');
   }
   public function store(Request $request)
   {
   	try {
   			DB::beginTransaction();
   				ItemCompanies::insert([
			   		'item_company_name' => $request->name,
			   		'status' => $request->status
			   	]);
   	   		DB::commit();

   	   	} catch (Exception $e) {
   	   		DB::rollback();
   	   	}
   }

   public function getCompanyList()
   {
   		$companies = ItemCompanies::all();
   		return view('setup.allCompany', compact('companies'));
   }

   public function changeCompanyStatus(Request $request, $id)
   {
   		if ($request->status == 1) {
   			ItemCompanies::where('item_company_id', $id)
   				->update([
   					'status' => 0
   				]);
   			return response()->json(['success' => true, 'message' => 'Deactivated']);
   		}
   		else {
   			ItemCompanies::where('item_company_id', $id)
   				->update([
   					'status' => 1
   				]);
   			return response()->json(['success' => true, 'message' => 'Activated']);
   		}
   }

   public function update(Request $request)
   {
      try{
            $update = ItemCompanies::where('item_company_id',$request->id)
                ->update([
                    'item_company_name' => $request->company
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
   	  return ItemCompanies::where('item_company_id', $id)->delete();
   }
}
