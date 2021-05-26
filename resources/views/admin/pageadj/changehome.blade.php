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
                                <li class="breadcrumb-item">Manage Page</li>
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
                        <form action="{{ route('edthome') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Title:</label><br>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Change title..." value="{{ old('title', $ipage->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#ubahImgCorousel"><i class="fas fa-images"></i> Change
                                    Corousel Image</button>
                            </div>
                            <div class="form-group">
                                <label>Title Corousel 1:</label>
                                <input type="text" name="title_c1"
                                    class="form-control @error('title_c1') is-invalid @enderror"
                                    placeholder="Title Corousel 1..." value="{{ old('title_c1', $ipage->title_c1) }}">
                                @error('title_c1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description Corousel 1:</label>
                                <input type="text" name="desc_c1"
                                    class="form-control @error('desc_c1') is-invalid @enderror"
                                    placeholder="Desc Corousel 1" value="{{ old('desc_c1', $ipage->desc_c1) }}">
                                @error('desc_c1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Title Corousel 2:</label>
                                <input type="text" name="title_c2"
                                    class="form-control @error('title_c2') is-invalid @enderror"
                                    placeholder="Title Corousel 2..." value="{{ old('title_c2', $ipage->title_c2) }}">
                                @error('title_c2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description Corousel 2:</label>
                                <input type="text" name="desc_c2"
                                    class="form-control @error('desc_c2') is-invalid @enderror"
                                    placeholder="Desc Corousel 2..." value="{{ old('desc_c2', $ipage->desc_c2) }}">
                                @error('desc_c2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Title Corousel 3:</label>
                                <input type="text" name="title_c3"
                                    class="form-control @error('title_c3') is-invalid @enderror"
                                    placeholder="Title Corousel 1..." value="{{ old('title_c3', $ipage->title_c3) }}">
                                @error('title_c3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description Corousel 3:</label>
                                <input type="text" name="desc_c3"
                                    class="form-control @error('desc_c3') is-invalid @enderror"
                                    placeholder="Desc Corousel 1..." value="{{ old('desc_c3', $ipage->desc_c3) }}">
                                @error('desc_c3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Welcome Image:</label><br>
                                <label>Current:<br><img src="{{ asset("user/img/$ipage->img_welcome") }}" width="240"
                                        height="128"></label>
                                <input type="file" name="img_welcome"
                                    class="form-control @error('img_welcome') is-invalid @enderror"
                                    placeholder="Welcome Image..." value="{{ old('img_welcome') }}">
                                @error('img_welcome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Welcome Title:</label>
                                <input type="text" name="title_welcome"
                                    class="form-control @error('title_welcome') is-invalid @enderror"
                                    placeholder="Welcome Title..."
                                    value="{{ old('title_welcome', $ipage->title_welcome) }}">
                                @error('title_welcome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Welcome Description:</label>
                                <textarea name="desc_welcome"
                                    class="form-control @error('desc_welcome') is-invalid @enderror"
                                    rows="5">{{ old('desc_welcome', $ipage->desc_welcome) }}</textarea>
                                @error('desc_welcome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Youtube ID:</label>
                                <input type="text" name="yt_id" class="form-control @error('yt_id') is-invalid @enderror"
                                    placeholder="Youtube ID..." value="{{ old('yt_id', $ipage->yt_id) }}">
                                @error('yt_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Youtube Background:</label><br>
                                <label>Current:<br> <img src="{{ asset('user/img/vid_bg.jpg') }}" width="240"
                                        height="128"></label>
                                <input type="file" name="yt_bg" class="form-control @error('yt_bg') is-invalid @enderror">
                                @error('yt_bg')
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
        {{-- Start Modal --}}
        <div class="modal fade" id="ubahImgCorousel" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Corousel Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('chchome') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Image Corousel 1:</label><br>
                                <label>Current:<br> <img src="{{ asset("user/img/$ipage->img_c1") }}" width="240"
                                        height="128"></label>
                                <input type="file" name="img_c1" class="form-control @error('img_c1') is-invalid @enderror"
                                    placeholder="Image Corousel 1...">
                                @error('img_c1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image Corousel 2:</label><br>
                                <label>Current:<br> <img src="{{ asset("user/img/$ipage->img_c2") }}" width="240"
                                        height="128"></label>
                                <input type="file" name="img_c2" class="form-control @error('img_c2') is-invalid @enderror"
                                    placeholder="Image Corousel 2...">
                                @error('img_c2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image Corousel 3:</label><br>
                                <label>Current:<br><img src="{{ asset("user/img/$ipage->img_c3") }}" width="240"
                                        height="128"></label>
                                <input type="file" name="img_c3" class="form-control @error('img_c3') is-invalid @enderror"
                                    placeholder="Image Corousel 3...">
                                @error('img_c3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal --}}
    @endsection
