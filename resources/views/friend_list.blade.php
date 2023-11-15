<div class="friend rounded shadow  bg-transparent">
    <h3 class="text-center p-2 ">Following</h3>
    <ul class=" friend1">
        @forelse (auth()->user()->followers as $user)
        {{-- <a href="" class="text-decoration-none text-dark "> --}}
            <li class=" friend1">
                <a href="{{ route('tweety_profile',$user) }}" class="text-decoration-none text-dark "> <img src="{{ $user->avatar }}" alt="" class="avater rounded-circle"></a>
                <a href="{{ route('tweety_profile',$user) }}" class="text-decoration-none text-dark "> <span class=" font-weight-bold ">{{$user->name}}</span> </a>
            </li>
        {{-- </a> --}}
        @empty
        <p>
            <li class="">
                <a href="" class="text-decoration-none text-dark "> <span class=" font-weight-bold ">No friends yet!</span> </a>
            </li>
        </p>
        @endforelse


    </ul>
</div>
