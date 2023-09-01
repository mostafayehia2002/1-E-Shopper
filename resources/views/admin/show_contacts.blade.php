@php
   use \Illuminate\Support\Facades\DB;
      function read($id){
      $data= DB::table('notifications')->where('data->message_id->id',$id)
      ->where('data->type','message')
        ->where('read_at','!=',NULL)
        ->first();

          return  !empty($data)? true:false;
        }

@endphp

@extends('admin.layouts.dashboard')
@section('title')
    show contactus
@endsection
@section('page address')
    Show All Message
@endsection
@section('content')
    <style>
        .read{
            background-color: #2a2a2a;
        }
        .btn-primary.read:hover{
            background-color: #2a2a2a;
        }
    </style>
    <div class="container" style="overflow-x: auto">
        @if(session('message-done'))
            <div  class="success-massage message">{{session()->get('message-done')}}</div>
        @endif
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->subject}}</td>

                    <td>
                        <button type="button" class="btn btn-primary see-message {{read($message->id)=='true'?'read':''}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$message->id}}"
                                message-id="{{$message->id}}" user-id="{{$message->user_id}}"
                        >
                            <i class="fa-sharp fa-solid fa-eye"></i>
                        </button>

                    </td>
                    <td>
                        <a href="{{route('admin.deleteMessage',['message' => $message->id, 'user' =>$message->user_id])}}" class="control-delete btn btn-primary"  onclick="return confirm('Are You Sure To Delete Message')"><span class="fa-solid fa-trash"></span></a>
                    </td>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop{{$message->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Show Message</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{$message->message}}
                                    </div>
                                </div>
                            </div>
                        </div>
                   {{-- end model --}}

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <script>
        document.addEventListener('click',function (e) {
            if(e.target.classList.contains('see-message')){
                let userID=  e.target.getAttribute('user-id');
                let messageID= e.target.getAttribute('message-id');
                markAsRead(userID,messageID);
            }
        });
    function markAsRead(userID,messageID) {
    $.ajax({
    url:'{{route('admin.markMessageAsRead')}}',
    method: 'POST',
    data: {
    _token: "{{csrf_token()}}",
    user:userID,
    message:messageID,
    },
    success: function(response) {
    // يمكنك إضافة التفاعلات الإضافية هنا بعد الاستجابة من الخادم

    }
    });
    }

    </script>
@endsection


