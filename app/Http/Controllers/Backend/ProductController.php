<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Product;
use App\Backend\Category;
use App\Backend\Brand;
use App\Backend\Color;
use App\Backend\ItemCompanies;
use App\Backend\Size;
use App\Backend\SubCategory;
use Session;
use DB;

class ProductController extends Controller
{
    public function index()
    {
            $categories = Category::all();         
                $brands = Brand::all(); 
                    $colors = Color::all();   
                        $companies = ItemCompanies::all();
                    $sizes = Size::all();
                $subCategories = SubCategory::all();
            return view('setup.productModal', compact('categories','brands','colors','companies','sizes','subCategories'));

             /*print "<pre>";
             print_r($datas);

              foreach($datas as $key => $data){
                 echo $key.'<br/>';
                 foreach($data as $value){
                     echo $value->category_id;
                 }
              } */
    }

    public function allProduct()
    {
        //return response()->json(['success' => true, 'message' => 'find']);
     
        $products = Product::get();
        return view('setup.allProduct',compact('products'));
    }

    public function store(Request $request)
    {   $id = Session::get('admin')->user_id;
    	try {
    		DB::beginTransaction();
    		  $stored = Product::insert([
                    'category_id'      => $request->category,
                    'sub_category_id'  => $request->subCategory,
                    'brand_id'         => $request->brand,
                    'color_id'         => $request->color,
                    'size_id'          => $request->size,
                    'item_company_id'  => $request->company,
                    'product_name'     => $request->productName,
                    'code'             => $request->code,
                    'purchase_price'   => $request->purchasePrice,
                    'sale_price'       => $request->salePrice, 
                    'discount'         => $request->discount, 
                    'quantity'         => $request->quantity, 
                    'status'           => $request->status,
                    'created_by'       => $id
                ]);
            if($stored){
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Insert Successfull']);
            }else{
                DB::rollback();
                return response()->json(['error' => true, 'message' => 'Some error Occured']);
            }
        }catch(\Exception $e){
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);

        }
    }

    public function update(Request $request)
    {   $id = Session::get('admin')->user_id;
        try{
            $update = Product::where('product_id',$request->id)
                ->update([
                    'product_name' => $request->name, 
                    'sale_price' => $request->price,
                    'updated_by' => $id
                ]);
            if($update){
                return response()->json(['success' => true, 'message' => 'Update Successfull']);
            }else{
                return response()->json(['error' => true, 'message' => 'Update unSuccessfull']);
            }
        }catch(\Exception $e){
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);

        }
    }

    public function changeStatus(Request $request, $id)
    {
         if ($request->status == 1) {
        
            Product::where('product_id', $id)
                        ->update(['status' => 0]);
        }
        else {
            Product::where('product_id', $id)
                        ->update(['status' => 1]);
        }
         return response()->json(['success' => true, 'message' => 'status Modified']);
    }

    public function delete($id)
    {
         return Product::where('product_id',$id)->delete();
    }
}
