@extends('layouts.app')

@section('content')
<div class="container p-1 mt-3 justify-content-center h-100">
    <div class=" justify-content-center">
        <div class="">
            <div class="card border-0  bg-transparent">
                <div class="card-header bg-transparent  border-0  text-center fs-2 text-dark fw-bold">{{ __('Create an account') }}</div>

                <div class="card-body ">
                    <form method="POST" action="{{ route('register') }}" class="form1 d-flex flex-column w-100">
                        @csrf
                        <div class="">
                            <label for="username" class="">Username</label>

                            <div class="">
                                <input id="username" type="text" class=" w-100 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus placeholder="Username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="">
                            <label for="name" class="">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class=" w-100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="w-100   @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

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
                                <input id="password" type="password" class="w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="w-100" name="password_confirmation" required autocomplete="new-password"  
                                placeholder="Confirm Password ">
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="d-flex justify-content-center flex-column align-items-center ">
                                <button type="submit" class="btn btn-primary px-5">
                                    {{ __('Register') }}
                                </button>
                                <p class="p-3 ">already have an account? <a href="{{ route('login') }}" class=" text-white-50">Clickhere</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
