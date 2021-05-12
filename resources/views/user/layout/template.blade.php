<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Construction Company Website Template" name="keywords">
    <meta content="Construction Company Website Template" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('user') }}/img/{{ $basecms->favicon }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('user') }}/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="{{ asset('user') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('user') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('user') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="{{ asset('user') }}/lib/slick/slick.css" rel="stylesheet">
    <link href="{{ asset('user') }}/lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('user') }}/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.html">
                                <h1>{{ $basecms->app_name }}</h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="flaticon-call"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Call Us</h3>
                                        <p>+{{ $basecms->call_us }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="flaticon-send-mail"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p>{{ $basecms->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="#" class="nav-item nav-link active">Home</a>
                            <a href="#" class="nav-item nav-link">About</a>
                            <a href="#" class="nav-item nav-link">Service</a>
                            <a href="#" class="nav-item nav-link">Team</a>
                            <a href="#" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="ml-auto">
                            <a class="btn" href="#">Get A Quote</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
@yield('content')
<!-- Footer Start -->
<div class="footer wow fadeIn" data-wow-delay="0.3s">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="footer-contact">
                    <h2>Office Contact</h2>
                    <p><i class="fa fa-map-marker-alt"></i>{{ $basecms->location }}</p>
                    <p><i class="fa fa-phone-alt"></i>{{ $basecms->call_us }}</p>
                    <p><i class="fa fa-envelope"></i>{{ $basecms->email }}</p>
                    <div class="footer-social">
                        <a href="{{ $basecms->fb_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $basecms->ig_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="footer-link">
                    <h2>Useful Pages</h2>
                    <a href="">About Us</a>
                    <a href="">Contact Us</a>
                    <a href="">Our Team</a>
                    <a href="">Projects</a>
                    <a href="">Testimonial</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <h2>Quotes</h2>
                <p>"{{ $basecms->quote }}" - {{ $basecms->quote_author }}</p>
            </div>
        </div>
    </div>
    <div class="container copyright">
        <div class="row">
            <div class="col-md-4">
                <p>&copy; <a href="#">{{ $basecms->app_name }}</a>, All Right Reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user') }}/lib/easing/easing.min.js"></script>
<script src="{{ asset('user') }}/lib/wow/wow.min.js"></script>
<script src="{{ asset('user') }}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('user') }}/lib/isotope/isotope.pkgd.min.js"></script>
<script src="{{ asset('user') }}/lib/lightbox/js/lightbox.min.js"></script>
<script src="{{ asset('user') }}/lib/waypoints/waypoints.min.js"></script>
<script src="{{ asset('user') }}/lib/counterup/counterup.min.js"></script>
<script src="{{ asset('user') }}/lib/slick/slick.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('user') }}/js/main.js"></script>
</body>
</html>