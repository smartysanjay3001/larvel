<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Cart;
use App\User;

class AdminController extends Controller
{

  public function index()
  {

    // $category1=Category::with('product')->first()->all();
    //   return response()->json($category1);


    $category = Category::all();
    $products = Products::latest()->paginate(15);
    $user = User::paginate(10);
    return view('amazon.admin.admin', [
      'category' => $category,
      "products" => $products,
      "user" => auth()->user(),
      "users" => $user
    ]);
  }
  public function showing()
  {
    $products = Products::all();
    return response()->json($products);
  }

  public function store(Request $request)
  {

    // $attributess = request()->validate([
    //   'category_id' => ['required'],
    //   'category_name' => ['required'],
    //   'product_title' => ['string', 'required'],
    //   'product_name' => ['string', 'required'],
    //   'product_image' => ['required'],
    //   'product_description' => ['string', 'required'],
    //   'product_price' => ['string', 'required'],
    //   'product_priceoriginal' => ['string'],
    //   'products_qty' => ['required']
    // ]);





    $imageName = time() . '.' . $request->product_image->extension();


    $request->product_image->move(public_path('images/amazon'), $imageName);

    $val = new Products();
    $val->category_id = $request->category_id;
    $val->category_name = $request->category_name;
    $val->product_title = $request->product_title;
    $val->product_name = $request->product_name;
    $val->product_image = $imageName;
    $val->product_description = $request->product_description;
    $val->product_price = $request->product_price;
    $val->product_priceoriginal = $request->product_priceoriginal;
    $val->products_qty = $request->products_qty;
    $val->save();
    return back()->withSuccess('sucessfully updated');
  }
  public function approve(Request $request)
  {

    Products::where('id', $request->id)->update(['product_status' => $request->product_status]);
    $cart1 = Products::where('id', $request->id)->pluck('product_status');

    foreach ($cart1 as $val) {
      $status = $val;
    }

    return response()->json($status);
  }

  public function edit(Request $request)
  {
    $category = Category::all();
    $products = Products::where('id', $request->id)->first();
    return view('amazon.admin.adminedit', [
      'category' => $category,
      "products" => $products,
      "user" => auth()->user(),
    ]);
  }

  public function update(Request $request)
  {
    // $attributess = request()->validate([
    //   'category_id' => ['required'],
    //   'product_title' => ['string', 'required'],
    //   'product_name' => ['string', 'required'],
    //   'product_image' => ['required'],
    //   'product_description' => ['string', 'required'],
    //   'product_price' => ['string', 'required'],
    //   'products_qty' => ['required']
    // ]);
    // dd(request()->all());
    if (request('product_image')) {
      $imageName = time() . '.' . $request->product_image->extension();


      $request->product_image->move(public_path('images/amazon'), $imageName);
    }



    Products::where('id', $request->id)->update([
      'category_id' => $request->category_id,
      'product_title' => $request->product_title,
      'product_name' => $request->product_name,
      'product_image' =>   $imageName ,
      'product_description' =>$request->product_description,
      'product_price' => $request->product_price,
      'products_qty' =>$request->products_qty

    ]);
    return redirect()->route('amz_admin');
  }
  public function delete(Request $request)
  {
  
    $cart1 = Products::where('id', $request->id)->first();
    $image="./images/amazon/$cart1->product_image";
    unlink($image);


    $cart = Products::where('id', $request->id)->delete();
    return response()->json($cart);
  }


  public function categoryadd(Request $request)
  {

    $attributess = request()->validate([
      'categories' => ['string', 'required'],
      'title' => ['string', 'required'],
    ]);


    Category::create($attributess);
    return back()->withSuccess('sucessfully updated');
  }

  public function catdelete(Request $request)
  {


    $cart1 = Category::where('id', $request->id)->delete();
    return response()->json($cart1);
  }



  public function search1(Request $request)
  {


    $search = $request->input('search');
    $categories = $request->input('category');

    $category = Category::all();

    $category2 = Category::whereId($categories)->get();


    if ($categories == 'All') {
      if (isset($search)) {
        $products = Products::where('product_name', 'like', "%{$search}%")->orWhere('category_name', 'like', "%{$search}%")->orWhere('product_title', 'like', "%{$search}%")->paginate(15);


        return view('amazon.admin.adminsearch', [
          'category' => $category,
          'products' => $products,
          "user" => auth()->user(),

        ]);
      } else {
        $products = Products::paginate(15);


        return view('amazon.admin.adminsearch', [
          'category' => $category,
          'products' => $products,
          "user" => auth()->user(),


        ]);
      }
    } else if ($categories) {
      $products = Products::where('category_id', $categories)->paginate(15);


      return view('amazon.admin.adminsearch', [
        'category' => $category,
        'products' => $products,
        "user" => auth()->user(),


      ]);
    } else {
      if ($categories !== ' ') {



        $products = Products::where([['product_name', 'like', "%{$search}%"], ['category_id', $categories]])->orWhere([['product_title', 'like', "%{$search}%"], ['category_id', $categories]])->orWhere('category_name', 'like', "%{$search}%")->paginate(8);

        return view('amazon.admin.adminsearch', [
          'category' => $category,
          'products' => $products,
          "user" => auth()->user(),

        ]);
      }
    }
  }


  public function admin(Request $request){
               
    User::where('id',$request->id)->update(['is_admin'=>$request->is_admin]);
   $cart1= User::where('id',$request->id)->pluck('is_admin');
  
    foreach($cart1 as $val){
         $status=$val;
    }
    
    return response()->json($status);
   
    }

}
