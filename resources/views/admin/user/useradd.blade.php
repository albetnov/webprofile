@extends('admin.layout.template')
@section('title', 'Add User')
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
                        <h3>Add User</h3>
                        <p class="text-subtitle text-muted">Fill the form to add user!</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Manage User</li>
                                <li class="breadcrumb-item"><a href="{{ route('useracc') }}">User Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add User Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('actaddusr') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Profile Picture:</label><br>
                                <input type="file" name="pro_pic"
                                    class="form-control @error('pro_pic') is-invalid @enderror" placeholder="propic">
                                @error('pro_pic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nama..." value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="Username..."
                                    value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Work Position:</label>
                                <input type="text" name="work_rank"
                                    class="form-control @error('work_rank') is-invalid @enderror"
                                    placeholder="Work Position..." value="{{ old('work_rank') }}">
                                @error('work_rank')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Link Instagram:</label>
                                <input type="text" name="ig_link"
                                    class="form-control @error('ig_link') is-invalid @enderror"
                                    placeholder="Link Instagram..." value="{{ old('ig_link') }}">
                                @error('ig_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Link Facebook:</label>
                                <input type="text" name="fb_link"
                                    class="form-control @error('fb_link') is-invalid @enderror"
                                    placeholder="Link Facebook..." value="{{ old('fb_link') }}">
                                @error('fb_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email..." value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan password!">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (session('level') === 'admin')
                                <div class="form-group">
                                    <label>Level:</label>
                                    <select name="level" class="form-select">
                                        <option disabled selected>Choose Level...</option>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                    </select>
                            @endif
                            @error('level')
                                <p class="text-danger">{{ $message }}</p>
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
