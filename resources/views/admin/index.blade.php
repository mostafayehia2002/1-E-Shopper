@extends('admin.layouts.dashboard')
@section('title')
    Home Page
@endsection
@section('page address')
    Home Page
@endsection
@section('content')
    <div class="page-boxes">
   <a href="{{route('admin.showAdmins')}}" class="box" >
       <div class="box-icon"><span class="fa-solid fa-user-secret"></span></div>
       <div class="box-count">{{$num_admins}}</div>
     <div class="box-name">show admins </div>
    </a>

    <a href="{{route('admin.showUsers')}}" class="box">
        <div class="box-icon"><span class="fa-solid fa-users"></span></div>
        <div class="box-count">{{$num_users}}</div>
        <div class="box-name">Show Users </div>
   </a>
<a href="{{route('admin.showProducts')}}" class="box">
    <div class="box-icon"><span class="fa-solid fa-cart-shopping"></span></div>
    <div class="box-count">{{$num_products}}</div>
    <div class="box-name">Show Products </div>
</a>
<a href="{{route('admin.showOrders')}}" class="box">
    <div class="box-icon"><span class="fa-solid fa-calendar"></span></div>
    <div class="box-count">{{$num_orders}}</div>
    <div class="box-name">Show Orders </div>
</a>
        <a href="{{route('admin.showCategories')}}" class="box">
            <div class="box-icon"><span class="fa-solid fa-shop"></span></div>
            <div class="box-count">{{$num_categories}}</div>
            <div class="box-name">Show Categories </div>
        </a>

    </div>
@endsection
