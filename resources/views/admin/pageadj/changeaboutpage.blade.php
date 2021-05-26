@extends('admin.layout.template')
@section('title', 'Change About Page')
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
                        <h3>Change About Page</h3>
                        <p class="text-subtitle text-muted">Fill the form to Change About Page!</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Manage User</li>
                                <li class="breadcrumb-item"><a href="{{ route('useracc') }}">User Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Change About Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change About Page Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('actaddusr') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>About Image:</label><br>
                                <input type="file" name="about_img"
                                    class="form-control @error('about_img') is-invalid @enderror"
                                    placeholder="Change about_img...">
                                @error('about_img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Work Expired:</label>
                                <input type="text" name="work_exp"
                                    class="form-control @error('work_exp') is-invalid @enderror" placeholder="work_exp..."
                                    value="{{ old('work_exp') }}">
                                @error('work_exp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>About Title:</label>
                                <input type="text" name="about_title"
                                    class="form-control @error('about_title') is-invalid @enderror"
                                    placeholder="about_title..." value="{{ old('about_title') }}">
                                @error('about_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>About P1:</label>
                                <input type="text" name="about_p1"
                                    class="form-control @error('about_p1') is-invalid @enderror" placeholder="about_p1..."
                                    value="{{ old('about_p1') }}">
                                @error('about_p1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>About P2:</label>
                                <input type="text" name="about_p2"
                                    class="form-control @error('about_p2') is-invalid @enderror" placeholder="about_p2..."
                                    value="{{ old('about_p2') }}">
                                @error('about_p2')
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
