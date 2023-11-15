@extends('amazon.layouts.app')

@section('content')







        <div class="container bg-white  rounded p-4 mt-3">
            <div class="container border-bottom p-1 ">

                <h3 class=" font-monospace  ">Your orders</h3>
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

                                <input type="number" name="" id="" class="ps-2 ss hff  rounded border-warning py-1" style="width: 70px;" value="{{ $cart1->product_qty}}" min="1" max="{{ $cart1->products_qty}}">






                            </div>
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
            {{ $cart->links() }}
        </div>





@endsection

@section('script')
<script src="{{ asset('js/cart.js') }}" defer></script>

@endsection
