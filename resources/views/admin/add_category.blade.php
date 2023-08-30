@extends('admin.layouts.dashboard')
@section('title')
    Add Category
@endsection
@section('page address')
    Add New Category
@endsection
@section('content')
    <form action="{{route('admin.storeCategory')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="all-fields">
            @if(session('success-add-category'))
                <div  class="success-massage  message">{{session()->get('success-add-category')}}</div>
            @endif
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger message">{{$error}}</div>
                    @endforeach
                @endif

                <div class="input-field">
                <label for="category">Category Name:</label>
                <br>
                <input type="text" id="category" name="category">
            </div>
            <div class="input-field  submit">
                <input type="submit" name="add" value="Add Category" style="width: 20%;">
            </div>
        </div>
    </form>
@endsection
