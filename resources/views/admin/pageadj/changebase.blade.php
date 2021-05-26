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
                                <li class="breadcrumb-item">Manage Page</li>
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
                        <form action="{{ route('edtbase') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Favicon:</label><br>
                                <label>Current: <img src="{{ asset("user/img/$bscms->favicon") }}"
                                        alt="No Favicon."></label>
                                <input type="file" name="favicon"
                                    class="form-control @error('favicon') is-invalid @enderror"
                                    placeholder="Change favicon...">
                                @error('favicon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>App Name:</label>
                                <input type="text" name="app_name"
                                    class="form-control @error('app_name') is-invalid @enderror" placeholder="App name..."
                                    value="{{ old('app_name', $bscms->app_name) }}">
                                @error('app_name')
                                    <div class=" invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Call us:</label>
                                <input type="number" name="call_us"
                                    class="form-control @error('call_us') is-invalid @enderror"
                                    placeholder="Phone Number..." value="{{ old('call_us', $bscms->call_us) }}">
                                @error('call_us')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email..." value="{{ old('email', $bscms->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>location:</label>
                                <input type="text" name="location"
                                    class="form-control @error('location') is-invalid @enderror" placeholder="Location..."
                                    value="{{ old('location', $bscms->location) }}">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Company Facebook:</label>
                                <input type="text" name="fb_link"
                                    class="form-control @error('fb_link') is-invalid @enderror"
                                    placeholder="Company Facebook link..." value="{{ old('fb_link', $bscms->fb_link) }}">
                                @error('fb_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Company Instagram:</label>
                                <input type="text" name="ig_link"
                                    class="form-control @error('ig_link') is-invalid @enderror"
                                    placeholder="Company Instagram link..."
                                    value="{{ old('ig_link', $bscms->ig_link) }}">
                                @error('ig_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quote:</label>
                                <input type="text" name="quote" class="form-control @error('quote') is-invalid @enderror"
                                    placeholder="quote..." value="{{ old('quote', $bscms->quote) }}">
                                @error('quote')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quote Author:</label>
                                <input type="text" name="quote_author"
                                    class="form-control @error('quote_author') is-invalid @enderror"
                                    placeholder="Quote Author..."
                                    value="{{ old('quote_author', $bscms->quote_author) }}">
                                @error('quote_author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
