@extends('layouts.app')

@section('content')

  <div class="container d-flex justify-content-center " >
  <form action="{{ $user->path() }}" method="POST" class="form" enctype="multipart/form-data"> 
    @csrf
    @method('PATCH')

    <div class=" ">
        <label for="name" class="">{{ __('Name') }}</label>

      
            <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
       
    </div>



    <div class=" ">
        <label for="username" class="">username</label>

   
            <input id="username" type="text" class=" @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" autocomplete="username" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
     
    </div>


    <div class=" ">
        <label for="avatar" class="">Profile update</label>

   <div class="d-flex">
    
    <input id="avatar" type="file" class=" @error('avatar') is-invalid @enderror border-0" name="avatar" value="" autocomplete="avatar" autofocus>
    <img src="{{ $user->avatar }}" alt="" width="60px">
   </div>

            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
     
    </div>





    <div class=" ">
        <label for="email" class="">{{ __('E-Mail Address') }}</label>

      
            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      
    </div>


    <div class=" ">
        <label for="password" class="">{{ __('Password') }}</label>

        
            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
    </div>


    <div class=" ">
        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

     
            <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
        
    </div>

       
    <div class="mx-auto">
        <button type="submit" class="btn btn-primary  ">
            {{ __('Submit') }}
        </button>

        <a  class="btn btn-white " href="{{ $user->path() }}">
            {{ __('Cancel') }}
        </a>
    </div>


  </form>

</div>

@endsection
