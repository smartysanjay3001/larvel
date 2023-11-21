@extends('amazon.layouts.app')

@section('content')

<div ng-controller="HomeController as homeCtrl">
    <div class="amz-search d-flex justify-content-evenly  p-1">
       
        <li class=" list-unstyled"><button href="" class=" text-decoration-none text-dark fw-bold border-0 bg-transparent " ng-click="homeCtrl.Bevarage()" ng-show="homeCtrl.pro">Product List</button></li>
        <li class=" list-unstyled" ><button href="" class=" text-decoration-none text-dark fw-bold border-0 bg-transparent " ng-click="homeCtrl.category()"ng-show="homeCtrl.cat" >Category Add</button></li>
        <li class=" list-unstyled" ><button href="" class=" text-decoration-none text-dark fw-bold border-0 bg-transparent "ng-show="homeCtrl.using" ng-click='homeCtrl.userlist()'>UserList</button></li>
        {{-- <li class=" list-unstyled" ><button href="" class=" text-decoration-none text-dark fw-bold border-0 bg-transparent " ng-click="homeCtrl.categorylist()">Category List</button></li> --}}
    </div>
    @include('amazon.admin.adminaddnewproduct')
    @include('amazon.admin.admincategory')
               
    @include('amazon.admin.adminproductlist')
    @include('amazon.admin.userlist')
    @include('amazon.admin.categorylist')
   

      
        


</div>



@endsection

@section('script')
<script src="{{ asset('js/admin.js') }}" defer></script>
@endsection
