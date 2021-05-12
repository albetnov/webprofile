@extends('user.layout.template')
@section('title', $ipg->title)
@section('content')
<!-- Carousel Start -->
<div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('user') }}/img/{{ $ipg->img_c1 }}" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">{{ $ipg->title_c1 }}</p>
                <h1 class="animated fadeInLeft">{{ $ipg->desc_c1 }}</h1>
                <a class="btn animated fadeInUp" href="#terjun">Go!!!</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('user') }}/img/{{ $ipg->img_c2 }}" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">{{ $ipg->title_c2 }}</p>
                <h1 class="animated fadeInLeft">{{ $ipg->desc_c2 }}</h1>
                <a class="btn animated fadeInUp" href="#terjun">Go!!!</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('user') }}/img/{{ $ipg->img_c3 }}" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">{{ $ipg->title_c3 }}</p>
                <h1 class="animated fadeInLeft">{{ $ipg->desc_c3 }}</h1>
                <a class="btn animated fadeInUp" href="#terjun">Go!!!</a>
            </div>
        </div>
    </div>

    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Carousel End -->


<!-- Feature Start-->
<div class="feature wow fadeInUp" data-wow-delay="0.1s">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="flaticon-worker"></i>
                    </div>
                    <div class="feature-text">
                        <h3>Expert Worker</h3>
                        <p>Di kerjakan dengan para staff yang berpengalaman</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="flaticon-building"></i>
                    </div>
                    <div class="feature-text">
                        <h3>Quality Work</h3>
                        <p>Kerjaan akan kami kerjakan secara profesional!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="flaticon-call"></i>
                    </div>
                    <div class="feature-text">
                        <h3>24/7 Support</h3>
                        <p>Siap membantu permasalahan anda selama 24/7 Jam!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->


<!-- About Start -->
<div class="about wow fadeInUp" id="terjun" data-wow-delay="0.1s">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">
                <div class="about-img">
                    <img src="{{ asset('user') }}/img/{{ $ipg->img_welcome }}" alt="Image">
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="section-header text-left">
                    <p>Welcome to {{ $basecms->app_name }}</p>
                    <h2>{{ $ipg->title_welcome }}</h2>
                </div>
                <div class="about-text">
                    <p>
                        {{ $ipg->desc_welcome }}
                    </p>
                    <a class="btn" href="{{ route('about') }}">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Service Start -->
<div class="service">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Services</p>
            <h2>We Provide Services</h2>
        </div>
        <div class="row">
            @foreach($service as $spg)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('user') }}/img/{{ $spg->service_img }}" alt="Image">
                        <div class="service-overlay">
                            <p>
                                {{ $spg->service_desc }}
                            </p>
                        </div>
                    </div>
                    <div class="service-text">
                        <h3>{{ $spg->service_title }}</h3>
                        <a class="btn" href="{{ asset('user') }}/img/{{ $spg->service_img }}" data-lightbox="service">+</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a href="{{ route('service') }}">See More...</a>
    </div>
</div>
<!-- Service End -->

<!-- Video Start -->
<div class="video wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <button type="button" class="btn-play" data-toggle="modal" data-src="https://www.youtube.com/embed/{{ $ipg->yt_id }}" data-target="#videoModal">
            <span></span>
        </button>
    </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>        
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video End -->


<!-- Team Start -->
<div class="team">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Team</p>
            <h2>Meet Our Team</h2>
        </div>
        <div class="row">
            @foreach ($team as $usr)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="team-img">
                        <img height="250" src="{{ asset('user') }}/usr_propic/{{ $usr->pro_pic }}" alt="Team Image">
                    </div>
                    <div class="team-text">
                        <h2>{{ $usr->name }}</h2>
                        <p>{{ $usr->work_rank }}</p>
                    </div>
                    <div class="team-social">
                        <a class="social-fb" href="{{ $usr->fb_link }}"><i class="fab fa-facebook-f"></i></a>
                        <a class="social-in" href="{{ $usr->ig_link }}"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

@endsection