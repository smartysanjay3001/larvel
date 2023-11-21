@extends('amazon.layouts.app')

@section('content')
{{-- <div class="amz-search">
    <p><a href="" class="fw-bold text-dark fs-5">Electronics</a></p>
    <a href="" class="fw-bold text-secondary mt-1">Mobiles</a>
    <a href="" class="fw-bold text-secondary  mt-1">Laptops</a>
    <a href="" class="fw-bold text-secondary  mt-1">Audio</a>
    <a href="" class="fw-bold text-secondary mt-1 ">Camera</a>
    <a href="" class="fw-bold text-secondary mt-1 ">Computer Peripherals</a>
    <a href="" class="fw-bold text-secondary mt-1 ">Smart Technology</a>
    <a href="" class="fw-bold text-secondary mt-1 ">Musical Instruments</a>
</div> --}}

<div class="container-fluid d-flex justify-content-center bg-white w-100 ">
    <img src="{{ asset('images/amazon/add.jpg') }}" alt="">
</div>

<div class="conatiner-fluid bg-white w-100 p-5  vh-100" ng-controller="CartController as cartCtrl">
    <div class="container-fluid p-4 ">
        <div class="row">
            <div class="col-md-3">
                <a href="" class="text-dark float-end "><i class="fa-regular fa-share-from-square"></i></a>
                <img src="{{ asset("images/amazon/$products->product_image") }} " alt="" class=" rounded nff" width="300px" height="350px">
            </div>


            <div class="col-md-6 d-flex flex-column  p-3">

                <h4>{{ $products->product_name }}</h4>

                <p><a href="" class="text-success">Visit the {{ $products->category_name }} Store</a></p>
                <span class="text-secondary " style="font-size: 13px">5K+ bought in past month</span>
                <div class="container-fluid d-flex gap-2 p-1 border-bottom">
                    <a class="text-secondary">4.3</a>
                    <a class="d-flex gap-1 mt-1 dropdown">
                        <i class="fa-solid fa-star text-warning  "></i>
                        <i class="fa-solid fa-star text-warning "></i>
                        <i class="fa-solid fa-star text-warning "></i>
                        <i class="fa-solid fa-star  text-warning "></i>
                        <i class="fa-regular fa-star text-warning  "></i>
                        <span class="dropdown-toggle text-dark"></span>
                    </a>

                    <a href="" class="text-info  border-left ">2,964 ratings </a>
                    <a class="border border-secondary"></a>
                    <a href="" class="text-info">632 answered questions</a>
                </div>

                <div class="container">
                    <div class="d-flex gap-1   ">
                        <span class="fs-5 text-danger ">-{{ round(($products->product_price/$products->product_priceoriginal)*100) }}%</span>
                        <h3> <sup class="fs-6">₹</sup>{{ $products->product_price }} </h3>
                    </div>
                    <span class="text-secondary" style="font-size: 13px">M.R.P.: <span class="text-decoration-line-through">₹{{ $products->product_priceoriginal  }}</span></span>
                    <p class="text-secondary" style="font-size: 13px">Inclusive of all taxes</p>
                    @if (6000 <= $products->product_price )
                        <p class="" style="font-size: 14px"><strong>EMI</strong> starts at ₹1,212. No Cost EMI available <a href="" class="text-info">EMI options</a></p>
                        @endif

                </div>


                <div class="container border-bottom p-2 ">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><img src="{{ asset('images/amazon/offer.png') }}" alt=""> <span class=" text-danger fw-bolder">Save Extra</span> with 4 offers</li>

                            <li class="list-group-item"><span class=" text-danger fw-bolder">No Cost EMI: </span>Upto ₹5,054.98 EMI interest savings on select Credit Cards</li>

                            <li class="list-group-item"><span class=" text-danger fw-bolder">Bank Offer: </span>Additional Flat INR 2250 Instant Discount on ICICI Bank Credit Cards (excluding Amazon Pay ICICI Credit Card) Credit Card Txn. Minimum purchase value INR 5000</li>

                        </ul>


                    </div>

                    <img src="{{ asset('images/amazon/delevery.png') }}" class="p-2" alt="">


                </div>
                <div class="conatiner">
                    <p class=" fw-bold p-2">About this item</p>
                    <li class=" break-all">{{ $products->product_description}}</li>
                </div>



            </div>
            <div class="col-md-2 ">

                <div class="container ">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-2">

                               <p class=" p-2 break-all"> <a href="" class="text-info">FREE delivery</a> <strong> Wednesday, 8 November.</strong> <a href="" class="text-info "> Details</a></p> 
                               <p class="p-2 break-all"> Or fastest delivery<strong> Tomorrow, 7 November. </strong> Order within <span class="text-success">6 hrs 17 mins.</span> <a href="" class="text-info"> Details</a></p>

                               <p class="p-2 break-all">
                                <i class="fa-solid fa-location-dot"></i>
                               <a href='' class=" text-success" style='font-size:14px'> Delivering to Madurai 625020 - Update location</a>
                                </p>
                                
                             

                            @if ($products->products_qty ==0)
                            <h4 class=" text-danger p-3">  No stocks</h4>
                  
                                @else
                                <h4 class=" text-success p-3">  In stock</h4>
                            @endif
                           <div class="d-flex flex-column p-2 gap-3">
                                     
                            @if (auth()->check())

                            @if($products->products_qty == 0)
                            <a href="" class="btn  rounded-pill" style="background: #ffd814; font-size:14px;"  >No Stocks please try another stocks </a>
                            @else
                            <button href="" class="btn  rounded-pill hff"   ng-click="cartCtrl.cart({{$products}},{{ $user }})" style="background: #ffd814;">Add to Cart</button>
                            <a href="{{ route('amz_cart') }}" class="btn  rounded-pill" style="background: #ffa41c;" ng-click="cartCtrl.cart({{ $products }},{{ $user }})">Buy Now</a>
                            @endif
                           
                                
                            @else
                            <a href="{{ route('register') }}" class="btn  rounded-pill" style="background: #ffd814;" >Add to Cart</a>
                            <a href="{{ route('register') }}" class="btn  rounded-pill" style="background: #ffa41c;" >Buy Now</a>
                                
                            @endif

                            <a href="" class="text-success p-2" style="color: #57afd8;"> <i class="fa-solid fa-lock text-dark me-2"></i> Secure transaction</a>
                           </div>

                            </li>

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>



@endsection

@section('script')
    <script src="{{ asset('js/cart.js') }}" defer></script>
@endsection
