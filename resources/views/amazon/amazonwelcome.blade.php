
@extends('amazon.layouts.app')


@section('content')
@include('amazon.carusol')
@include('amazon.trending')

    
@endsection

@section('script')
<script src="{{ asset('js/home.js') }}" defer></script>
    
@endsection