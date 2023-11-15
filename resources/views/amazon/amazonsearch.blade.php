@extends('amazon.layouts.app')

@section('content')
<div class="amz-search">

</div>

<div class="contianer-fluid p-3 hihuy h-100">
    <div class="row ">
        {{-- <div class="col-md-3 px-5 d-flex flex-column  gap-2">
            <div class="contianer">
                <h6>Delvery Day</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Get It by Tomorrow
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Get It in 2 Days
                    </label>
                </div>
            </div>
            <div class="contianer">
                <h6>Category</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Smartphones & Basic Mobiles
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Smartphones
                    </label>
                </div>
            </div>
            <div class="contianer">
                <h6>Customer Review</h6>
                <div class="d-flex gap-1  mb-1">
                    <i class="fa-solid fa-star text-warning  fs-6"></i>
                    <i class="fa-solid fa-star text-warning fs-6"></i>
                    <i class="fa-solid fa-star text-warning fs-6"></i>
                    <i class="fa-solid fa-star  text-warning fs-6"></i>
                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <div class="mb-1"> &up</div>

                </div>
                <div class="d-flex gap-1   mb-1">
                    <i class="fa-solid fa-star text-warning  fs-6"></i>
                    <i class="fa-solid fa-star text-warning fs-6"></i>
                    <i class="fa-solid fa-star text-warning fs-6"></i>

                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <div class="mb-1"> &up</div>

                </div>
                <div class="d-flex gap-1   mb-1">
                    <i class="fa-solid fa-star text-warning  fs-6"></i>
                    <i class="fa-solid fa-star text-warning fs-6"></i>
                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <div class="mb-1"> &up</div>

                </div>
                <div class="d-flex gap-1   mb-1">
                    <i class="fa-solid fa-star text-warning  fs-6"></i>

                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <i class="fa-regular fa-star text-warning fs-6"></i>
                    <div class="mb-1"> &up</div>


                </div>
            </div>

            <div class="contianer">
                <h6>Brands</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        realme
                    </label>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Samsung
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        OnePlus
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Nokia
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Redmi
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Lava
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Xiaomi
                    </label>
                </div>

            </div>

            <div class="conatiner">
                <h6>Price</h6>
                <p> Under ₹1,000</p>
                <p>₹1,000 - ₹5,000</p>
                <p> ₹5,000 - ₹10,000</p>
                <p> ₹10,000 - ₹20,000</p>
                <p> Over ₹20,000</p>

            </div>


            <div class="contianer d-flex flex-column gap-1">
                <h6>Delvery Day</h6>
                <a href="" class="text-decoration-none text-dark">All Discounts</a>
                <a href="" class="text-decoration-none text-dark">Today's Deals</a>

            </div>



        </div>

 --}}

        <div class="col-3"></div>


        <div class="col-md-7  p-2  ">

            @forelse ($product as $card )
            <div class="card mb-3   border-bottom">
                <div class="row g-0">

    {{-- <div class="col-1"></div > --}}
                    <div class="col-md-3 my-auto   ">
                        <a href="{{ route('amz_productlist',$card->id) }}" class="text-center ">
                            <img src="{{ asset("images/amazon/$card->product_image") }}" class="  object-fit-contain  rounded" alt="..." width=300 height=300px>
                        </a>
                    </div>
                    {{-- <div class="col-1"></div> --}}
                    <div class="col-md-7 ">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('amz_productlist',$card->id) }}" class="nght text-decoration-none text-dark">{{ $card->product_name }}</a></h5>

                            <div class="d-flex  mb-1">
                                <i class="fa-solid fa-star text-warning  fs-5"></i>
                                <i class="fa-solid fa-star text-warning fs-5"></i>
                                <i class="fa-solid fa-star text-warning fs-5"></i>
                                <i class="fa-solid fa-star  text-warning fs-5"></i>
                                <i class="fa-regular fa-star text-warning fs-5"></i>

                            </div>
                            <p class="fs-6 text-secondary">5K+ bought in past month</p>
                            <a href="{{ route('amz_productlist',$card->id) }}" class="btn btn-warning mb-1">Great Indian Festival</a>
                            <h4>₹{{ $card->product_price }} <span class="fs-6 text-secondary">M.R.P: ₹ {{ $card->product_priceoriginal }} (40% off)</span></h4>

                            @if (27000 >= $card->product_price )
                            <p class="fs-6 text-secondary">Buy for ₹22,749 with ICICI Bank credit</p>
                            @endif
                            <p class="fs-6 text-info"><i class="fa-solid fa-check text-warning"></i>prime</p>
                            <p class="fs-6">FREE Delivery by Amazon</p>
                            <p class="fs-6 text-danger-emphasis">Only {{ $card->products_qty }} left in stock.</p>

                        </div>
                    </div>

                </div>

            </div>
            @empty

            <h1>No result for {{$search}} </h1>
            <p>Try checking your spelling or use more general terms</p>

            @endforelse

            {{ $product->links() }}

         








</div>
</div>







</div>

</div>



@endsection
