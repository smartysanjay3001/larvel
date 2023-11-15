<nav class="navbar menu1 navbar-expand-lg ">
    <div class="container-fluid ">
        <div class="row w-100">
            <div class="col-md-2 d-flex justify-content-between">
                <a class="navbar-brand border1 " href="{{ route('amazon') }}">
                    <img src="{{ asset('images/amazon/logo.png') }}" alt="">

                </a>
                <a href="" class=" text-decoration-none  border1 ">
                    <span class="text-white-50 fw-light para ms-2">Delivering to chennai</span>
                    <div>
                        <i class="fa-solid fa-location-dot text-white"></i>
                        <span class="text-white fontw">Update location</span>
                    </div>
                </a>
            </div>

            <div class="col-sm-7 mt-2  ">

                <div class="drop ">
                    <form class="input-group " role="search" action="{{ route('amz_adminsearch') }}" method="get">
                        <select name="category" id="category" class=" input-group-text bg-white  border-none" value="">

                            <option value="All" class="mb-2"> All</option>
                            @foreach ($category as $catgories )
                            <option value="{{ $catgories->id }}" class="mb-2 p-2"> {{ $catgories->categories }}</option>

                            @endforeach

                        </select>



                        <input class="form-control  " type="search" placeholder="Search" aria-label="Search" name="search">

                        <button class="input-group-text bg-amz" type="submit"><i class="fas fa-search"></i></button>

                    </form>

                </div>

            </div>
            <div class="col-md-3 d-flex justify-content-between">

                <div class="mt-3 border1">

                    <img class="" src="{{ asset('images/amazon/indiaflag.png') }}" height="20">
                    <span class="text-white  dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false" style=" font-size: 13px">EN</span>

                </div>




                <div class="">
                    <div class="dropdown border1   ">
                        <div class="text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::check())
                            <div class="para">
                                Hello {{ $user->username }}
                            </div>
                            <div class="dropdown-toggle fontw">
                                Accounts & Lists
                            </div>

                            @else
                            <div class="para">
                                Hello, sign in
                            </div>
                            <div class="dropdown-toggle fontw">
                                Accounts & Lists
                            </div>

                            @endif
                        </div>

                        <ul class="dropdown-menu ff ">
                            @if (Auth::check())

                            <li class="text-center ">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="links border-0 px-4 btn btn-warning"> Logout</button>
                                </form>
                            </li>

                            @else
                            <li class="text-center "><a href="{{ route('login') }}" class="btn btn-warning px-5 p" href="#">signin</a></li>
                            <li class="text-center mt-2 "><span>New Customer ?</span>
                                <a href="{{ route('register') }}">Start here</a></li>

                            @endif






                        </ul>
                    </div>


                </div>



                <a href="" class=" text-decoration-none  border1">
                    <span class="text-white para ">Returns</span>
                    <div>

                        <span class="text-white fontw">& Orders</span>
                    </div>
                </a>

              
            



            </div>

        </div>





    </div>
</nav>



