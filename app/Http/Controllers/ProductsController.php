<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{


    public function oneproductlist(Request $request){
      session(['register'=>$request->url()]);
        $category=Category::all();
        $products= Products::find(['id'=>$request->id])->first();
      if(auth()->user()){
        $cart1=Cart::where("user_id",auth()->user()->id)->count();
      }
      else{
        $cart1=Cart::count();

      }


     
  
  
      if(Products::find(['id'=>$request->id])->where('product_status',1)->first()){
        return view('amazon.amazonlistpage',[
          'category'=>$category,
          "products"=> $products,
          "user"=>auth()->user(),
          'cart2'=> $cart1
    
        ]);
      }
      else{
     abort('404');
      }
        
    }
    
   
    
}

