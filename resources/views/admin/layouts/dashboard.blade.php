@php
   use \Illuminate\Support\Facades\DB;

  $order= DB::table('notifications')->where('read_at',NULL)->where('data->type','order')->get();
    $order = count($order);

    $message= DB::table('notifications')->where('read_at',NULL)->where('data->type','message')->get();
    $message = count($message);
 @endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset("css/datatables.min.css")}}>
    <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("css/all.min.css")}}>
    <link rel="stylesheet" href={{asset("css/admin.css")}}>
    <title>@yield('title')</title>
    <style>
        .container{
            padding-top: 20px;
        }
    </style>
</head>
<body>
<!-- start dashboard -->
<header class="Dashboard">
    <!-- <span class="setting"><i class="fa-solid fa-gear"></i></span> -->
    <div class="logo">
        <i class="fa-sharp fa-solid fa-house-user"></i>
        <span class="AppName">DashBoard</span>
    </div>
    <div class="links">
        <ul>
            <li>
                <a href={{route('admin.index')}}  {{Route::is('admin.index')?"class=active" : " "}}>
                    <i class="fa-solid fa-house"></i>
                    Home Page
                </a>
            </li>
            <li>
                <a href={{route('admin.addAdmin')}}  {{Route::is('admin.addAdmin')?"class=active" : " "}}>
                    <i class="fa-solid fa-user-plus"></i>
                    Add Admin
                </a>
            </li>
            <li>
                <a href="{{route('admin.addCategory')}}"  {{Route::is('admin.addCategory')?" class=active" : ""}}>
                    <i class="fa-solid fa-shop"></i>
                    Add Category
                </a>
            </li>
            <li>
                <a href="{{route('admin.addProduct')}}"  {{Route::is('admin.addProduct')?" class=active" : ""}}>
                    <i class="fa-solid fa-cart-plus"></i>
                    Add Product
                </a>
            </li>
        </ul>
    </div>
    <div class="user">
        <div class="user-img">
            <img src="{{asset('admin/profile_img/'.Auth::guard('admins')->user()->photo)}}" alt="error">
        </div>
        <div class="user-name">
            <span class="name">{{Auth::guard('admins')->user()->name}}</span>
            <br>
            <span class="email">
                        <a href={{'mailto:'.Auth::guard('admins')->user()->email}}>{{Auth::guard('admins')->user()->email}}</a>
                    </span>

                <div class="admin-setting">
                    <a href="{{route('admin.editAdmin',Auth::guard('admins')->user()->id)}}" class="edit-profile">
                        <i class="fa-solid fa-gear fa-spin" title="edit profile"></i>
                  </a>
                    <form  action="{{route('admin.logout')}}" method="post" class="logout">
                        @csrf
                        <button type="submit"> <i class="fa-sharp fa-solid fa-right-from-bracket fa-beat" title="Logout" id="logout"></i></button>
                    </form>

            </div>
        </div>
    </div>
</header>
<!-- end dashboard -->
<div class="container1">
    <!-- start navbar -->
    <div class="page-navbar">
        <div class="page-address">
            <p>
            <h3>@yield('page address')</h3>
            </p>
        </div>
        <div class="notification">
            <a href="{{route('admin.showContacts')}}" style=" position: relative;">
                <i class="fa-solid fa-message"></i>
                @if($message>0)
                    <div class="numberOfNotify">{{$message}}</div>
                @endif
            </a>

            <a href="{{route('admin.showOrders')}}" style=" position: relative;">
                <i class="fa-sharp fa-solid fa-bell"></i>
                @if($order>0)
                <div class="numberOfNotify">{{$order}}</div>
                @endif
            </a>

              <span class="setting">
                  <i class="fa-solid fa-bars fa-bounce"></i>
            </span>
        </div>
    </div>

    <!-- end navbar -->

   {{-- page content  --}}
    @yield('content')
{{--    end page content--}}

</div>
{{--data table--}}
<script src={{asset('https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js')}}></script>
<script src={{asset('https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js')}}></script>
<script src={{asset('https://code.jquery.com/jquery-3.7.0.js')}}></script>
{{----}}

<script src={{asset('js/datatables.min.js')}}></script>
<script src={{asset('js/bootstrap.bundle.js')}}></script>
<script src={{asset('js/admin.js')}}></script>
</body>
</html>
