<?php

namespace App\Http\Controllers;

use App\Jobs\TrendingJob;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use App\Models\Trend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     
    public function index(Request $request)
    {
        session(['register'=>$request->path()]);
        $category=Category::all();
       $products= Products::all();
    
       TrendingJob::dispatch();
       $order=Trend::join('amz_products', 'amz_products.id', '=', 'amz_trends.product_id')
       ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal','amz_products.id')
       ->get();
        $category1=Category::all()->random(8);
        if(auth()->user()){
              $cart1=Cart::where("user_id",auth()->user()->id)->count();
            }
            else{
              $cart1=Cart::count();
      
          }
    
        return view('amazon.amazonwelcome',[
          'category'=>$category,
          "card"=> $category1,
          "products"=> $products,
          "user"=>auth()->user(),
          'cart2'=> $cart1,
          'order'=>$order
        ]);
    }

    public function trends(){
       $order=Trend::join('amz_products', 'amz_products.id', '=', 'amz_trends.product_id')
       ->select('amz_products.product_title','amz_products.product_name','amz_products.product_image','amz_products.product_price','amz_products.product_priceoriginal')
       ->get();
      
      
     
       return Response::json($order);

    }
}
