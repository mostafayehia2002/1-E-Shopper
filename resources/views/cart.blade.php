@php
$total=0;
@endphp

@extends('layouts.navbar')
@section('content')
        <!-- Cart Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                        @if( !empty(session()->get('cart')))
                        @foreach(session()->get('cart') as $cart)
                            @php
                            $total+=$cart['product_price']*$cart['quantity'];
                          @endphp
                            <tr>
                                <td class="align-middle">
                                    <img src="{{asset('admin/product_img/'.$cart['product_photo'])}}" alt="" style="width: 50px;">
                                    {{$cart['product_name']}}
                                </td>
                                <td class="align-middle">{{$cart['product_price']}}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus decrease-button" data-id="{{$cart['product_id']}}" data-quantity="{{$cart['quantity']}}">
                                                <i class="fa fa-minus decrease-button" data-id="{{$cart['product_id']}}" data-quantity="{{$cart['quantity']}}"></i>
                                            </button>
                                        </div>

                                        <input type="text" class="form-control form-control-sm bg-secondary text-center order-value" value="{{$cart['quantity']}}" >

                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus increase-button" data-id="{{$cart['product_id']}}" data-quantity="{{$cart['quantity']}}">
                                                <i class="fa fa-plus increase-button" data-id="{{$cart['product_id']}}" data-quantity="{{$cart['quantity']}}"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle quantity">{{$cart['product_price']*$cart['quantity']}} </td>

                                <td class="align-middle">
                                    <a href="{{route('removeCart',$cart['product_id'])}}" class="btn btn-sm btn-primary" >
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-4">
                    <form class="mb-5" action="{{route('successOrder')}}"   method="post">
                        @csrf
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">ِAddress</h6>
                                <label>
                                    <input type="text" name="address" required style="border:1px solid #eee;outline: none ;width: 300px; padding:5px;" >
                                </label>
                            </div>
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">ِPhone Number</h6>
                                <label>
                                    <input type="tel" name="phone" required style="border:1px solid #eee;outline: none ;width: 300px; padding:5px;" >
                                </label>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <label>
                                    <input class="font-weight-bold" name="total" value="{{$total}}" readonly style="outline: none;border: none;width:50px">
                                </label>
                            </div>
                            <button class="btn btn-block btn-primary my-3 py-3" type="submit">Proceed To Checkout</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
     {{--end Cart--}}
<script>

        document.addEventListener('click',function (e) {
        let count=1;
        if(e.target.classList.contains('increase-button')){
        count=parseInt(e.target.getAttribute('data-quantity'))
        count++;
        updateOrderQuantity(count,e.target.getAttribute('data-id'));
        }else if(e.target.classList.contains('decrease-button')){
        count=parseInt(e.target.getAttribute('data-quantity'))
        count--;
        updateOrderQuantity(count,e.target.getAttribute('data-id'));
        }
        });

        function updateOrderQuantity(quantity,id) {
        $.ajax({
        url:'/update-quantity',
        method: 'POST',
        data: {
        _token: "{{csrf_token()}}",
        id:id,
        quantity: quantity,
        },
        success: function(response) {
        // يمكنك إضافة التفاعلات الإضافية هنا بعد الاستجابة من الخادم
        window.location.reload();
        }
        });
        }
</script>
@endsection
