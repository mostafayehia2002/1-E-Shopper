@extends('admin.layouts.dashboard')
@section('title')
    show users
@endsection
@section('page address')
    Show All Users
@endsection
@section('content')

    <div class="container" style="overflow-x: auto">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Start date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> <img src="{{asset('admin/profile_img/profile.jpg')}}" alt="no photo" style="width: 40px;height: 40px;border-radius:50%"></td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
