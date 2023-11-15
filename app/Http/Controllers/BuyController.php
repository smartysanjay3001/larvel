<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Cart;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BuyController extends Controller
{


    public function index(Request $request){
      
        $category=Category::all();
        $products= Products::all();
        
       
        if(auth()->user()){
          $cart1=Cart::where("user_id",auth()->user()->id)->count();
          $cart2=Buy::join('amz_products','amz_products.id', '=','amz_buys.product_id')
          ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_buys.product_qty','amz_products.id','amz_buys.product_id')->where("user_id",auth()->user()->id)->paginate(2);
        }
        else{
          $cart1=Cart::count();

          $cart2=Cart::join('amz_products','amz_products.id', '=','amz_buys.product_id')
          ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_buys.product_qty','amz_products.id','amz_buys.product_id')->paginate(2);
        }
      
  
        
         return view('amazon.cart.orders',[
           'category'=>$category,
           "products"=> $products,
           "user"=>auth()->user(),
           'cart'=>$cart2,
           'cart2'=>$cart1
           
         ]);
      }
  

    public function orders(Request $request){
       
        $order1=Cart::with('product')->where("user_id",auth()->user()->id)->get();
      
       
       
 
        foreach($order1 as $cart){
           Buy::create([
            'product_id'=>$cart->product_id,
            'user_id'=>auth()->user()->id,
            'product_qty'=>$cart->product_qty,
            'product_price'=>$cart->product->product_price * $cart->product_qty,
           ]);

           $order=Products::where('id',$cart->product_id)->first();
           $order->products_qty=$order->products_qty - $cart->product_qty;
           $order->update();
           

        }

        Cart::where("user_id",auth()->user()->id)->delete();
        return redirect()->route('buyshow');
        

       
    }

    public function oneproduct(Request $request){
      $order1=Cart::with('product')->where("user_id",auth()->user()->id)->where('product_id', $request->product_id)->first();
    
      Buy::create([
        'product_id'=> $order1->product_id,
        'user_id'=>auth()->user()->id,
        'product_qty'=> $order1->product_qty,
        'product_price'=> $order1->product->product_price *  $order1->product_qty,
       ]);

       $order=Products::where('id', $order1->product_id)->first();
       $order->products_qty=$order->products_qty -  $order1->product_qty;
       $order->update();
       Cart::where("user_id",auth()->user()->id)->where('product_id', $request->product_id)->delete();
       $cart=Buy::where('product_id', $request->product_id)->first();
      
           return Response::json($cart);
    }




    public function buyshow(){
      $category=Category::all();
      $products= Products::all();
      
     
      if(auth()->user()){
        $cart1=Cart::where("user_id",auth()->user()->id)->count();
        $cart2=Buy::join('amz_products','amz_products.id', '=','amz_buys.product_id')
        ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_buys.product_qty','amz_products.id','amz_buys.product_id')->where("user_id",auth()->user()->id)->paginate(2);
      }
      else{
        $cart1=Cart::count();

        $cart2=Cart::join('amz_products','amz_products.id', '=','amz_buys.product_id')
        ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_buys.product_qty','amz_products.id','amz_buys.product_id')->paginate(2);
      }

      return view('amazon.cart.buywelcome',[
        'category'=>$category,
        "products"=> $products,
        "user"=>auth()->user(),
        'cart'=>$cart2,
        'cart2'=>$cart1
        
      ]);
    }
}
