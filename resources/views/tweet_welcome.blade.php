<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />


</head>
<body class="welcome">

    @if (Route::has('login'))
    <div class="links">
          
    </div>
    @endif

    <div class="content ">
        <div class="tweetyhead">
            {{-- <img src="{{ asset('images/twiiter.png') }}" alt=""> --}}
            <i class="fa-brands fa-twitter bg-info"></i>
            <h2 class=""> Twitter</h2>
        </div>

        <div class="links">
            @auth
            <a href="{{ route('tweet_home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth



        </div>
    </div>

</body>
</html>
