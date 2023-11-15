@extends('layouts.app')

@section('content')
<div class="container-fluid p-1 mt-3 justify-content-center h-100">
    <div class=" justify-content-center">
        <div class=" ">
            <div class="card border-0 bg-transparent ">
               
                <div class="card-header border-0 bg-transparent text-center fs-2  fw-bold"></i>{{ __('Login') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="form1 d-flex flex-column w-100 form7 ">
                        @csrf

                        <div class="">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class=" w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="w-100  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class=" ">
                                <div class="">
                                    <input class="checkbox mt-2 p-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 ">
                            <div class="d-flex justify-content-center flex-column align-items-center">
                                <button type="submit" class="btn text-white btn-primary  px-5" >
                                    {{ __('Login') }}
                                </button>
                           

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mt-2 text-decoration-none text-dark " href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                              <p class=" p-2">Create an account ? <a href="{{ route('register') }}" class=" text-white-50">Clickhere</a></p>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




  
   
@endsection
