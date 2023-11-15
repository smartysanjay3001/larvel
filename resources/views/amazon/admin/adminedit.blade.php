@extends('amazon.layouts.app')

@section('content')

  
  
    <div class="container border mt-2 p-4 nffsd w-100 rounded" >
        <form action="{{ route('amz_update',$products->id) }}" method="POST" class="d-flex flex-column gap-3 w-100" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                <img src="{{ asset("images/amazon/$products->product_image") }}" alt="" srcset="" class=" img-fluid" height="200px" width="150px">


            </div>
            <div>
                <label for="" class="mb-2">Category</label>
                <select class="form-select" aria-label="Default select example" name='category_id' value="{{ $products->category_id }}">
                    <option value="All" selected disabled>Select</option>
                    @foreach ($category as $catgories )
                    <option value="{{ $catgories->id }}" class="mb-2 p-2"> {{ $catgories->categories }}</option>

                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="productname" class="form-label">ProductName</label>
                <input type="text" class="form-control" id="productname" placeholder="ProductName" name="product_name" value="{{  $products->product_name}}">
            </div>
            <div class="mb-3">
                <label for="ProductTitle" class="form-label">ProductTitle</label>
                <input type="text" class="form-control" id="ProductTitle" placeholder="ProductTitle" name="product_title"  value="{{  $products->product_title }}">
            </div>


            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">ProductImage</label>
                <input type="file" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name='product_image' >
                <span class="fs-6 text-secondary"> *jpg,*png,*jpeg,*webp</span>
            </div>
            <div class="mb-3">
                <label for="ProductDescription" class="form-label">ProductDescription</label>
                <input type="text" class="form-control" id="ProductDescription" placeholder="ProductDescription" name='product_description'  value="{{  $products->product_description }}">

            </div>


            <div class="mb-3">
                <label for="ProductPrice" class="form-label">ProductPrice</label>
                <input type="text" class="form-control" id="ProductPrice" placeholder="product_price" name="product_price"  value="{{  $products->product_price }}">
            </div>
            <div class="mb-3">
                <label for="ProductQuantity" class="form-label">ProductQuantity</label>
               
                <input type="number" class="form-control" id="ProductQuantity" placeholder="ProductQuantity" name="products_qty"  value="{{  $products->products_qty}}">
            </div>

            <div>
                <a href="{{ route('amz_admin') }}"  class="btn  bg-danger float-end px-5 " type="submit">Back</a>
                <button class="btn  bg-success float-end px-5 me-3" type="submit">Update</button>
            </div>
          
        </form>

    </div>

@endsection