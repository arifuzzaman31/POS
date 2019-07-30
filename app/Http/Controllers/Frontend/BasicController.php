<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\Category;
use App\Backend\SubCategory;
use App\Backend\Product;

class BasicController extends Controller
{
   	public function index()
   	{
   		$products = [];
   		$categories = Category::where('status',1)
   			->get();

   		// $categoryIds = Category::where('is_selected',1)
   		// 	->get();
   		$categoryForProduct = Category::where('status',1)
   			->where('is_selected',1)
   			->get();
   		foreach($categoryForProduct as $category){
   			$products[$category->category_name] = Product::with('images')->where('category_id',$category->category_id)
   				->where('status',1)
   				->take(8)
   				->get();
   		}

   		foreach ($products as $key => $values) {
   			foreach ($values as $key => $valu) {
   				//foreach ($valu as $key => $val) {
   					//print "<pre>";
   					//print_r($valu);
   					dd($valu);
   				//}
   				
   			}
   			
   		}
  
   		 //print "<pre>";
   		// dd($products);
   		 //print_r($products->images);
   		 //return $products->images->image_path;
   		// return $products;
		 return;
   		//return view('frontend.index',compact('categories','products'));
   	}
}