@extends('user.layout.template')
@section('title','Our Team')
@section('content')
<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Our Team</h2>
            </div>
            <div class="col-12">
                <a href="{{ route('home') }}">Home</a>
                <a href="">Our Team</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Team Start -->
<div class="team">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Team</p>
            <h2>Perkenalkan Tim Kami!</h2>
        </div>
        <div class="row">
            @foreach ($users as $usr)
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