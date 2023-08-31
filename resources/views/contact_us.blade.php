

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
<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form">
                <div id="success"></div>
                   <form name="sentMessage" id="contactForm" novalidate="novalidate"  action="{{route('storeMessage')}}" method="POST">
                       @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Your Name"
                               data-validation-required-message="Please enter your name" name="name" required />
                        <p class="help-block text-danger"></p>
                        @error('name')
                        <div class="alert alert-danger  message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                               data-validation-required-message="Please enter your email" name="email" required/>
                        <p class="help-block text-danger"></p>
                        @error('email')
                        <div class="alert alert-danger  message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="subject" placeholder="Subject"
                               data-validation-required-message="Please enter a subject"  name="subject" required/>
                        <p class="help-block text-danger"></p>
                        @error('subject')
                        <div class="alert alert-danger  message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Message" name="message" required
                                      data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                        @error('message')
                        <div class="alert alert-danger  message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                            Message</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
            <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
            <div class="d-flex flex-column mb-3">
                <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="d-flex flex-column">
                <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@include('layouts.footer')
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<!-- Contact Javascript File -->
<!-- Template Javascript -->

<script>
 let message=   document.querySelectorAll('.message');
     setTimeout(()=>{
         message.forEach((e)=>{
         e.style.display='none';
         });
     },3000);
</script>
<script src="{{asset('js/user.js')}}"></script>
</body>
</html>

