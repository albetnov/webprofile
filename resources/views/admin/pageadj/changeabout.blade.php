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
                                <li class="breadcrumb-item">Manage Page</li>
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
                        <form action="{{ route('edtabout') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>About Image:</label><br>
                                <label>Current: <br><img width="240" height="128"
                                        src="{{ asset("user/img/$gab->about_img") }}" alt="No Image"></label>
                                <input type="file" name="about_img"
                                    class="form-control @error('about_img') is-invalid @enderror"
                                    placeholder="Change About Image...">
                                @error('about_img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Work Experience:</label>
                                <input type="number" name="work_exp"
                                    class="form-control @error('work_exp') is-invalid @enderror"
                                    placeholder="Work Experience..." value="{{ old('work_exp', $gab->work_exp) }}">
                                @error('work_exp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>About Title:</label>
                                <input type="text" name="about_title"
                                    class="form-control @error('about_title') is-invalid @enderror"
                                    placeholder="About Title..." value="{{ old('about_title', $gab->about_title) }}">
                                @error('about_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>About Paragraph 1:</label>
                                <textarea rows="5" class="form-control @error('about_p1') is-invalid @enderror"
                                    name="about_p1">{{ old('about_p1', $gab->about_p1) }}</textarea>
                                @error('about_p1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>About Paragraph 2:</label>
                                <textarea rows="5" class="form-control @error('about_p2') is-invalid @enderror"
                                    name="about_p2">{{ old('about_p2', $gab->about_p2) }}</textarea>
                                @error('about_p2')
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
