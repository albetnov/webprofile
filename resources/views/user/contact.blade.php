@extends('user.layout.template')
@section('title','Contact Us')
@section('content')
<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Contact Us</h2>
            </div>
            <div class="col-12">
                <a href="{{ route('home') }}">Home</a>
                <a href="#">Contact Us</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="contact wow fadeInUp">
    <div class="container">
        <div class="section-header text-center">
            <p>Get In Touch</p>
            <h2>For Any Query</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="flaticon-address"></i>
                        <div class="contact-text">
                            <h2>Location</h2>
                            <p>{{ $basecms->location }}</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="flaticon-call"></i>
                        <div class="contact-text">
                            <h2>Phone</h2>
                            <p>+{{ $basecms->call_us }}</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="flaticon-send-mail"></i>
                        <div class="contact-text">
                            <h2>Email</h2>
                            <p>{{ $basecms->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <div id="success"></div>
                    <form method="POST" action="{{ route('scontact') }}" id="contactForm">
                        @csrf
                        <div class="control-group">
                            <input type="text" value="{{ old('name_contact') }}" class="form-control @error('name_contact') is-invalid @enderror" name="name_contact" id="name" placeholder="Your Name"/>
                            <p class="help-block text-danger">@error('name_contact') {{ $message }} @enderror</p>
                        </div>
                        <div class="control-group">
                            <input type="email" value="{{ old('email_contact') }}" class="form-control @error('email_contact') is-invalid @enderror" id="email" name="email_contact" placeholder="Your Email"/>
                            <p class="help-block text-danger">@error('email_contact') {{ $message }} @enderror</p>
                        </div>
                        <div class="control-group">
                            <input type="text" value="{{ old('subject_contact') }}" class="form-control @error('subject_contact') is-invalid @enderror" id="subject" name="subject_contact" placeholder="Subject"/>
                            <p class="help-block text-danger">@error('subject_contact') {{ $message }} @enderror</p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control @error('message_contact') is-invalid @enderror" id="message" placeholder="Message" name="message_contact">{{ old('message_contact') }}</textarea>
                            <p class="help-block text-danger">@error('message_contact') {{ $message }} @enderror</p>
                        </div>
                        <div>
                            <button class="btn" type="submit" id="sendMessageButton">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection