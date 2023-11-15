@extends('layouts.app')

@section('content')

<header class="d-flex flex-wrap flex-column gap-2 ">
    <div class="position-relative">
        <img src="{{asset('images/profile.jpg')}}" alt="" class="w-100 profile">
        <div class="profileavatar">
            <img src="{{ $user->avatar}}" alt="your avatar" class="avater rounded-circle">
        </div>

    </div>

    <div class="d-flex justify-content-between  align-self-stretch p-1 mt-3 flex-wrap hi2 ">
        <div class="hi3">
            <h3 class="  text-capitalize">
                {{ $user->name }}
            </h3>
            <p class="font-weight-light fs-6">{{ $user->created_at->diffForHumans() }}</p>
            
            @can('checkfrd',$user)
            
            <form action="{{ route('msg',$user->username) }}" method="post">
                @csrf
                <button class=" bg-transparent" type="submit"><i class="fa-solid fa-message text-primary"></i>  Message</button>
            </form>
            @endcan
        </div>




        <div class=" d-flex align-content-center flex-wrap p-1 gap-3 ">
            @can('edit', $user)

            <a href="{{ $user->path('edit') }}" class="btn  px-4 text-dark border  rounded-pill   ">Edit Profile</a>
            @endcan


            {{-- following  --}}
            @unless (auth()->user()->is($user))

            <form action="{{ route('tweety_follow',$user->username) }}" method="POST">
                @csrf
                <input type="submit" value="{{ auth()->user()->following($user) }}" class="btn px-4 text-white border btn-info  rounded-pill ">
            </form>
            @endunless
        </div>
    </div>

    <p class="p-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, nesciunt animi totam excepturi voluptatibus debitis eos itaque tempore, aut vel voluptatum, delectus quos cum dolor odit similique quasi officiis placeat!</p>

</header>



@include('time_line',[
'tweets'=>$tweets
])
@endsection
