



<div class="conatiner d-flex justify-content-center  p-4 ">
    @if($success=Session::get('success'))
    <h1 class=" font-monospace text-uppercase text-success">{{ $success }}</h1>
    @endif
</div>


<div class="container border mt-2 p-4 nffsd w-100 rounded"  ng-show="homeCtrl.update">

    <button href="" class="btn text-decoration-none text-dark border-0 bg-success fw-bold float-end me-2 mt-2 text-white py-1 "  ng-click="homeCtrl.Bevarage()">Product List</button>

    <div class="text-center">
        <img src="{{ asset('images/amazon/amazonlogo.png') }}" alt="" srcset="" class=" img-fluid">


    </div>
    <form action="{{ route('amz_adminstore') }}" method="POST" class="d-flex flex-column gap-3 w-100" enctype="multipart/form-data">
        @csrf
       
        <div>
            <label for="" class="mb-2">Category</label>
            <select class="form-select" aria-label="Default select example" name='category_id'>
                <option value="All" selected disabled>Select</option>
                @foreach ($category as $catgories )
                <option value="{{ $catgories->id }}" class="mb-2 p-2"> {{ $catgories->categories }}</option>

                @endforeach
            </select>
        </div>
        <div>
            <label for="" class="mb-2">Category</label>
            <select class="form-select" aria-label="Default select example" name='category_name'>
                <option value="All" selected disabled>Select</option>
                @foreach ($category as $catgories )
                <option value="{{ $catgories->categories }}" class="mb-2 p-2"> {{ $catgories->categories }}</option>

                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="productname" class="form-label">ProductTitle</label>
            <input type="text" class="form-control" id="productname" placeholder="ProductTitle " name="product_name">
        </div>
        <div class="mb-3">
            <label for="ProductTitle" class="form-label">ProductName</label>
            <input type="text" class="form-control" id="ProductTitle" placeholder="ProductName" name="product_title">
        </div>


        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">ProductImage</label>
            <input type="file" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name='product_image'>
            <span class="fs-6 text-secondary"> *jpg,*png,*jpeg,*webp</span>
        </div>
        <div class="mb-3">
           
            <label for="exampleFormControlTextarea1" class="form-label">ProductDescription</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  name='product_description'></textarea>
            {{-- <input type="text" class="form-control" id="ProductDescription" placeholder="ProductDescription" name='product_description'> --}}

        </div>

        <div class="mb-3">
            <label for="ProductPrice" class="form-label">ProductOrginalPrice</label>
            <input type="text" class="form-control" id="ProductPrice" placeholder="ProductOrginalPrice" name="product_priceoriginal">
        </div>

        <div class="mb-3">
            <label for="ProductPrice" class="form-label">DiscountPrice</label>
            <input type="text" class="form-control" id="ProductPrice" placeholder="DiscountPrice" name="product_price">
        </div>
        <div class="mb-3">
            <label for="ProductQuantity" class="form-label">ProductQuantity</label>
           
            <input type="number" class="form-control" id="ProductQuantity" placeholder="ProductQuantity" name="products_qty">
        </div>

        <div>
            <button class="btn  bg-success float-end px-5" type="submit">UPLOAD</button>
        </div>
    </form>

</div>

