@extends('admin.layouts.dashboard')
@section('title')
    Update Category
@endsection
@section('page address')
    Update New Category
@endsection
@section('content')

    <form action="{{route('admin.updateCategory',$category->id)}} " method="POST" enctype="multipart/form-data">
        @csrf
        <div class="all-fields">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger message">{{$error}}</div>
                    @endforeach
                @endif
                <div class="input-field">
                <label for="category">Category Name:</label>
                <br>
                <input type="text" id="category" name="category"  value="{{$category->category_name}}">
            </div>
            <div class="input-field  submit">
                <input type="submit" name="add" value="Update Category" style="width: 20%;">
            </div>
        </div>
    </form>
@endsection
