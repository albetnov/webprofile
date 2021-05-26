@extends('admin.layout.template')
@section('title', 'Change Home Page')
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
                        <h3>Change Home Page</h3>
                        <p class="text-subtitle text-muted">Fill the form to Change Home Page!</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Manage User</li>
                                <li class="breadcrumb-item"><a href="{{ route('useracc') }}">User Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Change Home Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Home Page Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('actaddusr') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Title:</label><br>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Change title...">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image C1:</label>
                                <input type="file" name="img_c1" class="form-control @error('img_c1') is-invalid @enderror"
                                    placeholder="img_c1..." value="{{ old('img_c1') }}">
                                @error('img_c1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Title C1:</label>
                                <input type="text" name="title_c1"
                                    class="form-control @error('title_c1') is-invalid @enderror" placeholder="title_c1..."
                                    value="{{ old('title_c1') }}">
                                @error('title_c1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description C1:</label>
                                <input type="text" name="desc_c1"
                                    class="form-control @error('desc_c1') is-invalid @enderror" placeholder="desc_c1..."
                                    value="{{ old('desc_c1') }}">
                                @error('desc_c1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image C2:</label>
                                <input type="file" name="img_c2" class="form-control @error('img_c2') is-invalid @enderror"
                                    placeholder="img_c2..." value="{{ old('img_c2') }}">
                                @error('img_c2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Title C2:</label>
                                <input type="text" name="title_c2"
                                    class="form-control @error('title_c2') is-invalid @enderror" placeholder="title_c2..."
                                    value="{{ old('title_c2') }}">
                                @error('title_c2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description C2:</label>
                                <input type="text" name="desc_c2"
                                    class="form-control @error('desc_c2') is-invalid @enderror" placeholder="desc_c2..."
                                    value="{{ old('desc_c2') }}">
                                @error('desc_c2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image C3:</label>
                                <input type="file" name="img_c3" class="form-control @error('img_c3') is-invalid @enderror"
                                    placeholder="img_c3..." value="{{ old('img_c3') }}">
                                @error('img_c3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Title C3:</label>
                                <input type="text" name="title_c3"
                                    class="form-control @error('title_c3') is-invalid @enderror" placeholder="title_c3..."
                                    value="{{ old('title_c3') }}">
                                @error('title_c3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description C3:</label>
                                <input type="text" name="desc_c3"
                                    class="form-control @error('desc_c3') is-invalid @enderror" placeholder="desc_c3..."
                                    value="{{ old('desc_c3') }}">
                                @error('desc_c3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Welcome Image:</label>
                                <input type="file" name="img_welcome"
                                    class="form-control @error('img_welcome') is-invalid @enderror"
                                    placeholder="img_welcome..." value="{{ old('img_welcome') }}">
                                @error('img_welcome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Welcome Title:</label>
                                <input type="text" name="title_welcome"
                                    class="form-control @error('title_welcome') is-invalid @enderror"
                                    placeholder="title_welcome..." value="{{ old('title_welcome') }}">
                                @error('title_welcome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Welcome Description:</label>
                                <input type="text" name="desc_welcome"
                                    class="form-control @error('desc_welcome') is-invalid @enderror"
                                    placeholder="desc_welcome..." value="{{ old('desc_welcome') }}">
                                @error('desc_welcome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Yt ID:</label>
                                <input type="text" name="yt_id" class="form-control @error('yt_id') is-invalid @enderror"
                                    placeholder="yt_id..." value="{{ old('yt_id') }}">
                                @error('yt_id')
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
