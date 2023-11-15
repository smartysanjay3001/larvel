@extends('layouts.app')

@section('content')

<div class="container1 p-5">
{{-- <div> --}}
    @foreach($users as $user)
  

  <a href="{{ $user->path() }}" class="border card1 text-decoration-none">
    <img src="{{ $user->avatar }}" alt="{{ $user->username }}" >
    <p class="text-center  mt-2 fs-5 ">{{'@'.$user->username }}</p>
  </a>
  
  {{-- </div> --}}
    @endforeach
</div>



  {{ $users->links() }}

@endsection
