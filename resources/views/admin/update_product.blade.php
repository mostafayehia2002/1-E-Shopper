@extends('admin.layouts.dashboard')
@section('title')
    Update Product
@endsection
@section('page address')
    Update New Product
@endsection
@section('content')

    <form action="{{route('admin.updateProduct',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="all-fields">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger message">{{$error}}</div>
                    @endforeach
                @endif

                <div class="input-field file">
                    <label for="product_photo">Product Photo:</label>
                    <br>
                    <input type="file" id="userPhoto" name="product_photo" accept="image/*" max="1">
                    <img src="{{asset('admin/product_img/'.$product->product_photo)}}" class="photo show" height="200px" width="200px" alt="error">
                </div>
            <div class="input-field">
                <label for="product_name">Product Name:</label>
                <br>
                <input type="text" id="product_name" name="product_name" value="{{$product->product_name}}">
            </div>
            <div class="input-field">
                <label for="product_price">Product Price:</label>
                <br>
                <input type="text" id="product_price" name="product_price" value="{{$product->product_price}}">
            </div>

            <div class="input-field">
                <label for="product_category">Product Category:</label>
                <br>
                  <input list="product_category" name="product_category"  value="{{$product->category_id}}">
                <datalist id="product_category">
                    @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->category_name}}</option>
                    @endforeach
                </datalist>
            </div>
            <div class="input-field  submit">
                <input type="submit" name="add" value="Update Product" style="width: 20%;">
            </div>
        </div>
    </form>
@endsection
