@extends('amazon.layouts.app')

@section('content')

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center flex-column gap-3">

    <h2 class="">Thank you for your purchase🤗. We are honored to have customers😉 <span class="text-success">like you</span>💛.</h2>

   <div>
    <a href="{{  route('orders')  }}" class="btn btn-warning py-2 px-5">Your Orders  ✔</a>
    <a href="{{  route('amazon')  }}" class="btn btn-secondary py-2 px-5">Home Page</a>
   </div>
     
</div>

@endsection
