<button href="" class=" btn text-decoration-none text-dark border-0 bg-success fw-bold float-end me-2 mt-2 text-white py-1 " ng-click="homeCtrl.categorylist()" ng-show='homeCtrl.catlist'>Category List</button>

<div class="conatiner d-flex justify-content-center  p-4 ">
    @if($success=Session::get('success'))
    <h1 class=" font-monospace text-uppercase text-success">{{ $success }}</h1>
    @endif
</div>



<div class="container border mt-2 p-4 nffsd w-100 rounded"  ng-show="homeCtrl.category1">
    <div class="text-center">
        <img src="{{ asset('images/amazon/amazonlogo.png') }}" alt="" srcset="" class=" img-fluid">


    </div>
    <form action="{{ route('amz_admincategory') }}" method="POST" class="d-flex flex-column gap-3 w-100" enctype="multipart/form-data">
        @csrf
    

        <div class="mb-3">
            <label for="ProductPrice" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="ProductPrice" placeholder="Category Name" name="categories">
        </div>
        <div class="mb-3">
            <label for="ProductQuantity" class="form-label">Category title</label>
           
            <input type="text" class="form-control" id="ProductQuantity" placeholder="Category title" name="title">
        </div>

        <div>
            <button class="btn  bg-success float-end px-5" type="submit">UPLOAD</button>
        </div>
    </form>

</div>

