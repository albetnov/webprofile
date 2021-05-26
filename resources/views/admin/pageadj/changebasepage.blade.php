@extends('admin.layout.template')
@section('title', 'Change Base Page')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Change Base Page</h3>
                        <p class="text-subtitle text-muted">Fill the form to Change Base Page!</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Manage User</li>
                                <li class="breadcrumb-item"><a href="{{ route('useracc') }}">User Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Change Base Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Base Page Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('actaddusr') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Favicon:</label><br>
                                <input type="file" name="favicon"
                                    class="form-control @error('favicon') is-invalid @enderror"
                                    placeholder="Change favicon...">
                                @error('favicon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>App_name:</label>
                                <input type="text" name="App_name"
                                    class="form-control @error('App_name') is-invalid @enderror" placeholder="App name..."
                                    value="{{ old('App_name') }}">
                                @error('App_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Call_us:</label>
                                <input type="text" name="Call_us"
                                    class="form-control @error('Call_us') is-invalid @enderror"
                                    placeholder="Phone Number..." value="{{ old('Call_us') }}">
                                @error('Call_us')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email..." value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>location:</label>
                                <input type="text" name="location"
                                    class="form-control @error('location') is-invalid @enderror" placeholder="Location..."
                                    value="{{ old('location') }}">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Facebook:</label>
                                <input type="text" name="fb_link"
                                    class="form-control @error('fb_link') is-invalid @enderror" placeholder="fb_link..."
                                    value="{{ old('fb_link') }}">
                                @error('fb_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Instagram:</label>
                                <input type="text" name="ig_link"
                                    class="form-control @error('ig_link') is-invalid @enderror" placeholder="ig_link..."
                                    value="{{ old('ig_link') }}">
                                @error('ig_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quote:</label>
                                <input type="text" name="quote" class="form-control @error('quote') is-invalid @enderror"
                                    placeholder="quote..." value="{{ old('quote') }}">
                                @error('quote')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quote Author:</label>
                                <input type="text" name="quote_author"
                                    class="form-control @error('quote_author') is-invalid @enderror"
                                    placeholder="quote_author..." value="{{ old('quote_author') }}">
                                @error('quote_author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="button" onclick="location.href='{{ route('useracc') }}'"
                                    class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i></button>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
