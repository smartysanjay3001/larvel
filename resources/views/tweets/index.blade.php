@extends('layouts.app')

@section('content')

@include('publish_tweet')

<div class="">
    @include('time_line')
</div>

@endsection

@section('script')
    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection
