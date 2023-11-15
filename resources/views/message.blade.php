@extends('layouts.app')

@section('content')

<div class=" border bg-body-secondary ngf rounded">
    <div class="bg-success w-100 p-2 rounded-top ft">
        <a href="" class="text-decoration-none text-dark ">
            <li class=" list-unstyled">
                <a href="{{ route('tweety_profile',$user) }}" class="text-decoration-none text-dark "> <img src="{{ $user->avatar }}" alt="" class="avater rounded-circle"></a>
                <a href="{{ route('tweety_profile',$user) }}" class="text-decoration-none text-dark "> <span class=" font-weight-bold ">{{$user->name}}</span> </a>
            </li>
        </a>

    </div>

    {{-- message --}}

    <div class="container2">


        @foreach ( $message1 as $msg )
        @if(auth()->user()->id == $msg->user_id)
        <div class="message-orange">
            <p class="message-content">{{ $msg->msg }}</p>

        </div>
        @endif

        @endforeach

        @foreach ( $msg2 as $msg )
        @if(auth()->user()->id !== $msg->user_id)
        <div class="message-blue">
            <p class="message-content">{{ $msg->msg }}</p>

        </div>
        @endif
        @endforeach

    </div>

    {{-- end --}}


    <div class="fg ">
        <form action="{{ route('msgstore',$user->id) }}" class="  rounded" method="POST">
            @csrf
            <div class="hu">
                <textarea name="msg" id="" cols="" rows="2" class=" rounded px-2 textarea w-100 border-0" placeholder="whats up..?"> </textarea>
                <button type="submit" class="bg-transparent nf"> <i class="fa-regular fa-paper-plane "></i></button>
            </div>


            @error('body')
            <p class="text-danger text-center">{{ $message }}</p>
            @enderror
        </form>

    </div>

</div>





@endsection
