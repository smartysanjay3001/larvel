@extends('layouts.app')

@section('content')


<div class="friend rounded shadow  bg-transparent">
    <h3 class="text-center p-2 ">friends</h3>
    <ul class=" " >
        @forelse (auth()->user()->followers as $user)
        <a href="{{ route('msg',$user->username) }}" class="text-decoration-none text-dark ">
            <li class="friend1" >
                <a href="{{ route('msg',$user->username) }}" class="text-decoration-none text-dark "> <img src="{{ $user->avatar }}" alt="" class="avater rounded-circle"></a>
                    <a href="{{ route('msg',$user->username) }}" class="text-decoration-none text-dark "> <span class=" font-weight-bold ">{{$user->name}}</span> </a>
            </li>
        </a>
        @empty
          <p> <li class="" >
                <a href="" class="text-decoration-none text-dark "> <span class=" font-weight-bold ">No friends yet!</span> </a>
        </li></p>
        @endforelse
    
    
    </ul>
    </div>
    
    
    
      





@endsection
