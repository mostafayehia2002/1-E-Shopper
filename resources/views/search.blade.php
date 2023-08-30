@extends('layouts.navbar')
@section('content')
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{asset('admin/product_img/'.$product->product_photo)}}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$product->product_name}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{$product->product_price}}</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary mr-1"></i>
                                View Detail
                            </a>
                            <p class="btn btn-sm text-dark p-0 addToCart" data-id="{{$product->id}}">
                                <i class="fas fa-shopping-cart text-primary mr-1" ></i>
                                Add To Cart
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <!-- Products End -->
@endsection
