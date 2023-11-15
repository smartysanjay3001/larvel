<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">

    <link href="{{ asset('css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>
<body ng-app="myApp" >
    {{-- <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid justify-content-center">
            <i class="fa-solid fa-x   ms-5"></i>
            
            <a class="navbar-brand ms-2" href="#"> Tweety</a>
             
         
            
            @if (auth()->check())
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
             
              

              
                <ul class="navbar-nav me-auto mb-2 mb-lg-0  mx-auto fs-5">



                    <li class="nav-item ">
                      <a class="nav-link active" aria-current="page" href="{{ route('tweet_home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/explore">Explore</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('tweety_profile',auth()->user()) }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="post" class="nav-link">
                            @csrf
                      <input type="submit" value="Logout" class=" border-0 bg-body-tertiary  ">
                          </form>
                    
                    </li>
                   
                   
                  </ul>
              
                  @endif
              
            </div>
        </div>
    </nav> --}}


    <div id="app" class="container-fluid">
       
        <div class="container-fluid  pt-4  " >
            <div class="row">
                <div class="col hi">
                    @if (auth()->check())
                    @include('side_links')
                    @endif

                </div>
                <div class=" col-md-6   ">
                    <div class="container  p-2 rounded ">
                        @yield('content')
                    </div>
                </div>
                <div class="col ">
                    @if (auth()->check())

                    @include('friend_list')
                    @endif
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js') }}"></script>
    @yield('script')
</body>
</html>
