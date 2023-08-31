@extends('admin.layouts.dashboard')
@section('title')
    show orders
@endsection
@section('page address')
    Show All Orders
@endsection

@section('content')
    <style>
        .visit{
            background-color: #2a2a2a;
        }
    </style>
    <div class="container" style="overflow-x: auto">
        @if(session('order-done'))
            <div  class="success-massage message">{{session()->get('order-done')}}</div>
        @endif
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                 <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Total Order</th>
                <th>Show Order</th>
                <th>Done</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td> {{$order->id}}</td>
                    <td> {{$order->user->name}}</td>
                    <td> {{$order->user->email}}</td>
                    <td> {{$order->phone}}</td>
                    <td> {{$order->address}}</td>
                    <td> {{$order->total_price}}</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$order->id}}">
                            <i class="fa-sharp fa-solid fa-eye see-order" user-id="{{$order->user_id}}" order-id="{{$order->id}}" ></i>
                        </button>
                     </td>

                    <td><a href="{{route('admin.orderDone',['order' => $order->id, 'user' => $order->user_id])}}" class="btn btn-primary" onclick="return confirm('Are You Sure To Delete Order')"  ><i class="fa-solid fa-check"></i></a></td>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Order Details</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($order->orders as $o)
                                            <span>Product ID : {{$o['product_id']}}</span>
                                             <br>
                                            <span>Product Name: {{$o['product_name']}}</span>
                                            <br>
                                            <span>Product Price: {{$o['product_price']}}</span>
                                            <br>
                                            <span>Product Quantity: {{$o['quantity']}}</span>
                                            <br>
                                            <span>Total Product Price: {{$o['product_price']*$o['quantity']}} </span>
                                            <hr>
                                        @endforeach
                                        <span>Total Order Price: {{$order->total_price}}</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>

        document.addEventListener('click',function (e) {
            if(e.target.classList.contains('see-order')){
                let userID=  e.target.getAttribute('user-id');
                let orderID= e.target.getAttribute('order-id');
                markAsRead(userID,orderID);
            }
        });

        function markAsRead(userID,orderID) {
            $.ajax({
                url:'{{route('admin.markAsRead')}}',
                method: 'POST',
                data: {
                    _token: "{{csrf_token()}}",
                    user:userID,
                    order:orderID,
                },
                success: function(response) {
                    // يمكنك إضافة التفاعلات الإضافية هنا بعد الاستجابة من الخادم

                }
            });
        }
    </script>
@endsection
