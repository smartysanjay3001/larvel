@extends('layouts.app')

@section('content')

<div class="friend rounded shadow  bg-transparent">
    
    <ul class=" " >
        @forelse (auth()->user()->requests as $user)
        <div href="" class="text-decoration-none text-dark ">
            <li class="d-flex align-items-center gap-2" >
                <a href="{{ route('tweety_profile',$user) }}" class="text-decoration-none text-dark "> <img src="{{ $user->avatar }}" alt="" class="avater rounded-circle"></a>
                    <a href="{{ route('tweety_profile',$user) }}" class="text-decoration-none text-dark "> <span class=" font-weight-bold ">{{$user->name}}</span> </a>
                    <form action="{{ route('tweety_accept',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="{{ auth()->user()->following($user)? 'btn-info':'btn-light' }} btn mt-2">Accept</button>
                    </form>
                    <form action="{{ route('tweety_decline',$user->id) }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class=" btn mt-2 btn-light">Decline</button>
                    </form>

            </li>
            
           
        </div>
        @empty
          <p> <li class="" >
                <a href="" class="text-decoration-none text-dark"> <span class=" font-weight-bold text-center">No Notifications yet!</span> </a>
        </li></p>
        @endforelse
    



    
    </ul>
    </div>
    




@endsection
