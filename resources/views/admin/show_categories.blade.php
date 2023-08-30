@extends('admin.layouts.dashboard')
@section('title')
    show categories
@endsection
@section('page address')
    Show All Categories
@endsection
@section('content')

    <div class="container" style="overflow-x: auto">
        @if(session('success-update-category'))
            <div  class="success-massage message">{{session()->get('success-update-category')}}</div>
        @endif
        @if(session('success-delete-category'))
            <div  class="success-massage message">{{session()->get('success-delete-category')}}</div>
        @endif

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Control</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->category_name}}</td>
                    <td>
                        <a href="{{route('admin.editCategory',$c->id)}}" class="control-edit btn btn-primary"><span class="fa-solid fa-pen-to-square"></span></a>
                        <a href="{{route('admin.deleteCategory',$c->id)}}" class="control-delete btn btn-primary" onclick="return confirm('Are You Sure To Delete Category')" ><span class="fa-solid fa-trash"></span></a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection
