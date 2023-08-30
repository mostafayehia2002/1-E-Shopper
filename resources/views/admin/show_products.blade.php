@extends('admin.layouts.dashboard')
@section('title')
    show products
@endsection
@section('page address')
    Show All Products
@endsection
@section('content')
    <div class="container" style="overflow-x: auto">

        @if(session('success-delete-product'))
            <div  class="success-massage message">{{session()->get('success-delete-product')}}</div>
        @endif

            @if(session('success-update-product'))
                <div  class="success-massage message">{{session()->get('success-update-product')}}</div>
            @endif
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Category</th>
                <th> Created at</th>
                <th> Updated at</th>
                <th>Control</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td> <img src="{{asset('admin/product_img/'.$product->product_photo)}}" alt="no photo" style="width: 40px;height: 40px;border-radius:50%"></td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->category->category_name}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>
                        <a href="{{route('admin.editProduct',$product->id)}}" class="control-edit btn btn-primary"><span class="fa-solid fa-pen-to-square"></span></a>
                        <a href="{{route('admin.deleteProduct',$product->id)}}" class="control-delete btn btn-primary"  onclick="return confirm('Are You Sure To Delete Product')"><span class="fa-solid fa-trash"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
