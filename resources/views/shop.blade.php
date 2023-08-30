
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/user.css')}}" rel="stylesheet">
</head>
<body>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0">
                <a href="{{route('homePage')}}">Home</a>
            </p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-12">
        <!-- Shop Sidebar Start -->
        <!-- Shop Sidebar End -->
        <!-- Shop Product Start -->
        <div class="col-lg-12 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <form action="{{route('searchProducts')}}" method="post">
                            @csrf
                            <div class="input-group">
                                <label>
                                    <input type="text" class="form-control" placeholder="Search by name" name="search">
                                </label>
                                <div class="input-group-append">

                                            <span class="input-group-text bg-transparent text-primary">
                                             <button type="submit" style="border: none;background-color: white;"><i class="fa fa-search"></i></button>
                                            </span>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button
                                class="btn border dropdown-toggle"
                                type="button"
                                id="triggerId"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                Sort by
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">Latest</a>
                                <a class="dropdown-item" href="#">Popularity</a>
                                <a class="dropdown-item" href="#">Best Rating</a>
                            </div>
                        </div>
                    </div>
                </div>
                 {{--   --}}
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

            <!-- Shop Product End -->
        </div>
        <!-- Shop product  End -->
    </div>
</div>
    <!-- Shop End -->
   @include('layouts.footer')
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}" > </script>
<script>
    document.addEventListener('click',function (e) {
        if(e.target.classList.contains('addToCart')){
            let id=  e.target.getAttribute('data-id');
            addToCart(id);
        }
    });
    function addToCart(id) {
        $.ajax({
            url:'/add_to_cart',
            method: 'POST',
            data: {
                _token: "{{csrf_token()}}",
                id:id,
            },
            success: function(response) {
                // يمكنك إضافة التفاعلات الإضافية هنا بعد الاستجابة من الخادم
                window.location.reload();
            }
        });
    }
</script>
</body>

</html>

