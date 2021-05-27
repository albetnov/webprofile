@extends('admin.layout.template')
@section('title', 'Add Staff Announcement')
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
                        <h3>Add Staff Announcement Page</h3>
                        <p class="text-subtitle text-muted">Fill the form to Add Staff Announcement Page!</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Add Staff Announcement Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Staff Announcement Page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('savestaffanc') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Announcement Image:</label><br>
                                <input type="file" name="info_img"
                                    class="form-control @error('info_img') is-invalid @enderror" placeholder="info_img...">
                                @error('info_img')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Announcement Title:</label>
                                <input type="text" name="info_title"
                                    class="form-control @error('info_title') is-invalid @enderror"
                                    placeholder="Announcement title..." value="{{ old('info_title') }}">
                                @error('info_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Announcement Descriptions:</label>
                                <textarea name="info_desc" class="form-control @error('info_desc') is-invalid @enderror"
                                    rows="5">{{ old('info_desc') }}</textarea>
                                @error('info_desc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="button" onclick="location.href='{{ route('staffanc') }}'"
                                    class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i></button>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
