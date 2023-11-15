


@extends('amazon.layouts.app')
@section('content')

<div class="container  mt-2 p-4  w-100 rounded bg-transparent" >
   
    
    @foreach ($products as $product )
    <div class="card mb-3 " >
        <div class="row g-0">
            <div class="col-md-3 p-2  ">
                <img src="{{ asset("images/amazon/$product->product_image") }}" class=" rounded" alt="..." width=300 height=320px>
            </div>
            <div class="col-md-8 ">
                <div class="card-body">
                    <h5 class="card-title"><a href="" class="nght text-decoration-none text-dark">{{ $product->product_name }}</a></h5>

                    <div class="d-flex  mb-1">
                        <i class="fa-solid fa-star text-warning  fs-5"></i>
                        <i class="fa-solid fa-star text-warning fs-5"></i>
                        <i class="fa-solid fa-star text-warning fs-5"></i>
                        <i class="fa-solid fa-star  text-warning fs-5"></i>
                        <i class="fa-regular fa-star text-warning fs-5"></i>

                    </div>
                    <p class="fs-6 text-secondary">5K+ bought in past month</p>
                    <div class="container">
                  
                 
                    <button class=" text-center rounded px-4 py-2 text-white {{$product->product_status == 0 ? 'bg-success' :'bg-danger'  }}  border-0" id="approve" ng-click="homeCtrl.approve({{ $product->id}} , {{  $product->product_status}},$event)">{{$product->product_status == 0 ? 'Approve' : 'DisApprove' }}</button> 


                    <a href="{{ route('amz_edit',$product->id ) }}" class="btn  px-4 text-dark border  text-white rounded   " style="background:#ffa41c;">Edit</a>
                    <a href=""  class="btn  px-4 text-dark border bg-danger text-white rounded   " ng-click='homeCtrl.delete({{ $product->id  }},$event)'>Delete</a>
                    </div>
                    <h4 class="mt-2">₹{{ $product->product_price }} <span class="fs-6 text-secondary ">M.R.P: ₹ {{ $product->product_priceoriginal }} (40% off)</span></h4>
                 
                  
                    <p class="fs-6 text-danger-emphasis">Only {{ $product->products_qty }} left in stock.</p>

                </div>
            </div>
        </div>
    </div>

    @endforeach

    {{ $products->links() }}
   
</div>
    
@endsection