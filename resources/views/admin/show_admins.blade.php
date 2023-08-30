@extends('admin.layouts.dashboard')
@section('title')
    show admins
@endsection
@section('page address')
    Show All Admins
@endsection
@section('content')
    @if(session('success-delete-admin'))
        <div  class="success-massage message">{{session()->get('success-delete-admin')}}</div>
    @endif
    @if(session('success-update-admin'))
        <div  class="success-massage message">{{session()->get('success-update-admin')}}</div>
    @endif
    <div class="container" style="overflow-x: auto">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>status</th>
                <th>Start date</th>
                <th>control</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $a)
                <tr>
                    <td>{{$a->id}}</td>
                    <td> <img src="{{asset('admin/profile_img/'.$a->photo)}}" alt="no photo" style="width: 40px;height: 40px;border-radius:50%"></td>
                    <td>{{$a->name}}</td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->status==0?'sub admin':'admin'}}</td>
                    <td>{{$a->created_at}}</td>
                    <td>
                        <a href="{{route('admin.editAdmin',$a->id)}}" class="btn btn-primary control-edit"><span class="fa-solid fa-pen-to-square"></span></a>
                        <a href="{{route('admin.deleteAdmin',$a->id)}}" class="btn btn-primary control-delete"><span class="fa-solid fa-trash"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
