@extends('user.layout.template')
@section('title','Our Service')
@section('content')
<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Our Services</h2>
            </div>
            <div class="col-12">
                <a href="{{ route('home') }}">Home</a>
                <a href="#">Our Services</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Service Start -->
<div class="service">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Services</p>
            <h2>Servis Yang Kami Sediakan</h2>
        </div>
        <div class="row">
            @foreach($spage as $spg)
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
    </div>
</div>
<!-- Service End -->
@endsection