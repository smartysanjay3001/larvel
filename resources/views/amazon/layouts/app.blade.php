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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/amazon/amazon.css') }}">



</head>

@if(Auth::check())
@if(auth()->user()->is_admin==1)
@include('amazon.adminnav')
@else
@include('amazon.nav')

@endif
@else
@include('amazon.nav')
@endif

{{-- --}}


             
         

<body ng-app="myApp">


    @yield('content')




   



 @include('amazon.footer')
    @yield('script')
    <script src="{{ asset('js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js') }}"></script>
    <script>
        let mybutton = document.getElementById("myBtn");
        window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}


function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
    </script>
</body>
</html>
