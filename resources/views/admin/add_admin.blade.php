@extends('admin.layouts.dashboard')
@section('title')
    Add Admin
@endsection
@section('page address')
    Add New Admin
@endsection
@section('content')
    <form action="{{route('admin.storeAdmin')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="all-fields">
            @if(session('success-add-admin'))
                <div  class="success-massage message">{{session()->get('success-add-admin')}}</div>
            @endif
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
                <img src="" class="photo" height="200px" width="200px">
            </div>
            <div class="input-field">
                <label for="username">User Name:</label>
                <br>
                <input type="text" id="username" name="name"  value="{{old('username')}}">
            </div>
            <div class="input-field">
                <label for="password">Password:</label>
                <br>
                <input type="text" id="password" name="password">
            </div>
            <div class="input-field">
                <label for="email">Email</label>
                <br>
                <input type="email" id="email" name="email"  value="{{old('email')}}">
            </div>
            <div class="input-field">
                <label for="role">Role:</label>
                <br>
                <input list="status" name="status" value="0">
                <datalist id="status">
                    <option value="0">Sub Admin</option>
                    <option value="1">Admin</option>
                </datalist>
            </div>

            <div class="input-field  submit">
                <input type="submit" name="add" value="Add User" style="width: 20%;">
            </div>
        </div>
    </form>
@endsection
