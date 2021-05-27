@extends('admin.layout.template')
@section('title', 'Change Service Page')
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
                        <h3>Change Service Page</h3>
                        <p class="text-subtitle text-muted">Fill the form to Change Service Page!</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Manage Page</li>
                                <li class="breadcrumb-item active" aria-current="page">Change Service Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Service Page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('actaddusr') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Service Image:</label><br>
                                <input type="file" name="service_img"
                                    class="form-control @error('service_img') is-invalid @enderror"
                                    placeholder="service_img">
                                @error('service_img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Service Title:</label>
                                <input type="text" name="service_title"
                                    class="form-control @error('service_title') is-invalid @enderror" placeholder="Nama..."
                                    value="{{ old('service_title') }}">
                                @error('service_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Service Desc:</label>
                                <input type="text" name="service_desc"
                                    class="form-control @error('service_desc') is-invalid @enderror"
                                    placeholder="service_desc..." value="{{ old('service_desc') }}">
                                @error('service_desc')
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
