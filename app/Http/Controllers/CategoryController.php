<?php

namespace App\Http\Controllers;

use App\Jobs\TrendingJob;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
 
  public function search(Request $request){
    session(['register'=>$request->url()]);
   $search=$request->input('search');
   $categories=$request->input('category');
   session(['search'=>$search]);
   session(['categories'=>$categories]);
   $category=Category::all();
   if(auth()->user()){
          $cart1=Cart::where("user_id",auth()->user()->id)->count();
        }
        else{
          $cart1=Cart::count();
  
        }
   $category2=Category::whereId($categories)->get();
  
   
     if($categories == 'All'){
      if(isset($search)){
        $products=Products::join('amz_categories','amz_categories.id','=','amz_products.category_id')->where('product_status',1)->where('product_name','like',"%{$search}%")->orWhere('product_title','like',"%{$search}%")->orwhere('amz_categories.categories','like',"%{$search}%")->paginate(15);
      
    
        return view('amazon.amazonsearch',[
              'category'=>$category,
              'product'=> $products,
              "user"=>auth()->user(),
              'cart2'=> $cart1
            ])->withSearch($search);

              
      }
     
      else{
        $products=Products::where('product_status',1)->paginate(15);

      
        return view('amazon.amazonsearch',[
          'category'=>$category,
          'product'=> $products,
          "user"=>auth()->user(),
          'cart2'=> $cart1
  
        ])->withSearch($search);

      }
     
     }
else if($categories && $search){
  $products= Products::join('amz_categories','amz_categories.id','=','amz_products.category_id')->where([['product_name','like',"%{$search}%"],['amz_categories.id','=',"$categories"]])->orwhere('amz_categories.categories','like',"%{$search}%")->paginate(15);

      
  return view('amazon.amazonsearch',[
    'category'=>$category,
    'product'=> $products,
    "user"=>auth()->user(),
    'cart2'=> $cart1

  ])->withSearch($search);



}

     else if($categories) {
      $products=Products::where('product_status',1)->where('category_id',$categories)->paginate(15);

      
      return view('amazon.amazonsearch',[
        'category'=>$category,
        'product'=> $products,
        "user"=>auth()->user(),
        'cart2'=> $cart1

      ])->withSearch($search);
     
    }
     else{
      if($categories !== ' '){

     
    
        $products=Products::join('amz_categories','amz_categories.id','=','amz_products.category_id')->where('product_status',1)->where([['product_name','like',"%{$search}%"],['category_id',$categories]])->orWhere([['product_title','like',"%{$search}%"],['category_id',$categories]])->paginate(8);

        return view('amazon.amazonsearch',[
          'category'=>$category,
          'product'=> $products,
          "user"=>auth()->user(),
          'cart2'=> $cart1
        ])->withSearch($search);
      }
      }

     
   
    

  

  }


  
}
