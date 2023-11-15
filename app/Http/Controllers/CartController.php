<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
    public function cart(Request $request){
      session(['register'=>$request->path()]);
        $category=Category::all();
        $products= Products::all();
        
       
        if(auth()->user()){
          $cart1=Cart::where("user_id",auth()->user()->id)->count();
          $cart2=Cart::join('amz_products','amz_products.id', '=','amz_carts.product_id')
          ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_carts.product_qty','amz_products.products_qty','amz_products.id','amz_carts.product_id')->where("user_id",auth()->user()->id)->paginate(2);
        }
        else{
          $cart1=Cart::count();

          $cart2=Cart::join('amz_products','amz_products.id', '=','amz_carts.product_id')
          ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_carts.product_qty','amz_products.products_qty','amz_products.id','amz_carts.product_id')->paginate(2);
        }
      
  
        
         return view('amazon.cart.cart',[
           'category'=>$category,
           "products"=> $products,
           "user"=>auth()->user(),
           'cart'=>$cart2,
           'cart2'=>$cart1
           
         ]);
    }
 
    public function cart1(){
         $cart2=Cart::join('amz_products','amz_products.id', '=','amz_carts.product_id')
          ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_carts.product_qty','amz_products.products_qty','amz_products.id','amz_carts.product_id')->where("user_id",auth()->user()->id)->get();
         return response()->json($cart2);
    }


    public function store(Request $request){

      
      
         $cart=Cart::where("user_id",auth()->user()->id)->where('product_id',$request->product_id)->pluck('product_qty');
       
  
           
         if(Cart::where("user_id",auth()->user()->id)->where('product_id',$request->product_id)->exists()){
           foreach($cart as $d){
      
            if($d > 0){
             $df=$d + 1;
             Cart::where("user_id",auth()->user()->id)->where('product_id',$request->product_id)->update(
              [
                'product_qty'=>$df, 
              ]
             );

            }

           }
        
         }
         else{
     
              Cart::create([
                'user_id'=>$request->user_id,
                'product_id'=>$request->product_id,
                
             
              ]);
         }
            
            $cart1=Cart::where("user_id",auth()->user()->id)->count();

             return response()->json($cart1,200);
       

         

    }



      public function delete(Request $request){
       
            Cart::where('product_id',$request->product_id)->delete();
            $cart2=Cart::join('amz_products','amz_products.id', '=','amz_carts.product_id')
        ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_carts.product_qty','amz_products.products_qty','amz_products.id','amz_carts.product_id')->where("user_id",auth()->user()->id)->get();
       return response()->json($cart2);



      }

      public function update( Request $request){
        Cart::where('product_id',$request->product_id)->update(
          [
            'product_qty'=>$request->product_qty, 
          ]
        );
        $cart2=Cart::join('amz_products','amz_products.id', '=','amz_carts.product_id')
        ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_carts.product_qty','amz_products.products_qty','amz_products.id','amz_carts.product_id')->where("user_id",auth()->user()->id)->get();
       return response()->json($cart2);


      }




      // json showing
      public function showing(){
        $products= Products::all();
        return response()->json($products);
        
      }
}
