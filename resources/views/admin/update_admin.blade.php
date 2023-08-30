@extends('admin.layouts.dashboard')
@section('title')
     Update Admin
@endsection
@section('page address')
    Update New Admin
@endsection
@section('content')
    <form action="{{route('admin.updateAdmin',$admin->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="all-fields">

          {{-- error  validation message--}}
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger message">{{$error}}</div>
                    @endforeach
                @endif
            <div class="input-field file">
                <label for="userPhoto">Photo:</label>
                <br>
                <input type="file" id="userPhoto" name="photo" accept="image/*" max="1">
                <img src="{{asset('admin/profile_img/'.$admin->photo)}}" class="photo show" height="200px" width="200px">
            </div>
            <div class="input-field">
                <label for="username">User Name:</label>
                <br>
                <input type="text" id="username" name="name"  value="{{$admin->name}}">
            </div>
            <div class="input-field">
                <label for="password">Password:</label>
                <br>
                <input type="password" id="password" name="password" value="{{$admin->password}}">
            </div>
            <div class="input-field">
                <label for="email">Email</label>
                <br>
                <input type="email" id="email" name="email"  value="{{$admin->email}}">
            </div>
            <div class="input-field">
                <label for="role">Role:</label>
                <br>
                <input list="status" name="status" value="{{$admin->status}}">
                <datalist id="status">
                    <option value="0">Sub Admin</option>
                    <option value="1">Admin</option>
                </datalist>
            </div>

            <div class="input-field  submit">
                <input type="submit" name="update" value="Update User" style="width: 20%;">
            </div>
        </div>
    </form>
@endsection
