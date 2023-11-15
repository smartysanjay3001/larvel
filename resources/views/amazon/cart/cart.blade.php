@extends('amazon.layouts.app')

@section('content')

<div ng-controller="CartBuyController as cartbuyCtrl" class="container-fluid p-4 ">


    {{-- <button class="btn btn-warning" ng-click='cartbuyCtrl.prtview()'>product json</button> --}}
    <div class="row gap-3">

        <div class="col-md-8 p-2 ">


            <div class="container bg-white rounded p-4 ">
                <div class="container border-bottom p-1 ">

                    <h3 class=" font-monospace  ">Shopping Cart</h3>
                    <div class="container align-items-center d-flex justify-content-end">
                        <span class="">Price</span>
                    </div>
                </div>


                @foreach ( $cart as $cart1 )
                <div class="card mb-3 p-1 border-0 border-bottom ">
                    <div class="row g-0">
                        <div class="col-md-3">

                            <img src="{{ asset("images/amazon/$cart1->product_image") }}" class="rounded-start" alt="..." height="250px">
                        </div>

                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">{{ $cart1->product_name }}</h5>
                                <span class=" text-success">In stock</span>
                                <p class=" text-secondary" style='font-size:13px;'>Eligible for FREE Shipping</p>
                                <img src="{{ asset('images/amazon/ful.png') }}" alt="">

                                <div class="container  d-flex gap-4 align-items-center  p-2">

                                    <input type="number" name="" id="" ng-click="cartbuyCtrl.update({{ $cart1->product_id }},$event)" class="ps-2 ss hff  rounded border-warning py-1" style="width: 70px;" value="{{ $cart1->product_qty}}" min="1" max="{{ $cart1->products_qty }}">




                                    <a href="" class=" text-success border-danger p-1 " style="font-size: 14px" ng-click="cartbuyCtrl.delete({{$cart1->product_id}},$event)">Delete</a>

                                </div>

                                <button class="btn btn-warning px-5 m-1" ng-click="cartbuyCtrl.buy({{$cart1->product_id}},$event)">Buy</button>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class="card-body float-end">
                                <span class="btn btn-danger fw-bold " style=" font-size:10px;">17% off</span>
                                <p class=" fw-bold text-danger mt-1 " style=" font-size:12px;">Great Indian Festival sale</p>
                                <p class=" fw-bold " style=" font-size:16px;"><sup>₹</sup>{{ $cart1->product_price}}</p>
                                <p class=" fw-bold text-secondary" style=" font-size:12px;">MRP: <span class=" text-decoration-line-through">₹{{ $cart1->product_priceoriginal }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>

               

                @endforeach
                
                <div class="container p-1 ">
                  
                    <div class="container align-items-center d-flex justify-content-end">
                        <span class="">Subtotal ( items): <sup>₹</sup> <span class="fs-5 ffd"></span></span>
                    </div>
                </div>
                {{ $cart->links() }}
            </div>
        </div>
        <div class="col-md-2  p-2  ">
            <div class="card  border-0 rounded ">

                <div class="card-body justify-content-center d-flex flex-column align-items-center">
                    <p class="text-success fw-bold" style="font-size:13px;"><i class="fa-solid fa-circle-check me-1"></i>Your order is eligible for FREE delivery</p>
                    <p></p>
                    <p></p>
                    <span class="">Subtotal ( items): <sup>₹</sup> <span class="fs-5 ffd"></span></span>
                    <form action="{{ route('order1') }}" method="POST">
                        @csrf
                        <button type="submit" href="" class="py-1 px-4 btn mx-auto  btn-warning text-white mt-2  ">Buynow</button>
                    </form>


                </div>
            </div>

        </div>
    </div>


</div>


@endsection

@section('script')
<script src="{{ asset('js/cart.js') }}" defer></script>

@endsection
