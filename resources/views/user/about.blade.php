@extends('user.layout.template')
@section('title','About Us')
@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>About Us</h2>
            </div>
            <div class="col-12">
                <a href="{{ route('home') }}">Home</a>
                <a href="#">About Us</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="about wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">
                <div class="about-img">
                    <img src="{{ asset('user') }}/img/{{ $apg->about_img }}" alt="Image">
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="section-header text-left">
                    <p>{{ $apg->about_title }}</p>
                    <h2>{{ $apg->work_exp }} Tahun Pengalaman</h2>
                </div>
                <div class="about-text">
                    <p>
                        {{ $apg->about_p1 }}    
                    </p>
                    <p>
                        {{ $apg->about_p2 }}
                    </p>
                    <a class="btn" href="{{ route('service') }}">Our Service</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection