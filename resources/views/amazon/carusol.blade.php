<div class="container-fluid px-5 heelo ">

    <div id="carouselExampleAutoplaying" class="carousel slide hero" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/amazon/carusol1.jpg') }}" class="d-block w-100 rounded" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/amazon/carusol2.jpg') }}" class="d-block w-100 rounded " alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/amazon/carusol3.jpg') }}" class="d-block w-100 rounded" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    @include('amazon.welcomecard')
</div>



