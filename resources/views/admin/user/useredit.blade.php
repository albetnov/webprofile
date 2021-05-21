@extends('admin.layout.template')
@section('title', 'Edit User')
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
                        <h3>Edit User</h3>
                        <p class="text-subtitle text-muted">Fill the form to edit user!</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Manage User</li>
                                <li class="breadcrumb-item"><a href="{{ route('useracc') }}">User Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/user/act_edit/' . $userdetail->id) }}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            <div class="form-group">
                                <label>Profile Picture:</label><br>
                                <label>Current: <br>
                                    @if (empty($userdetail->pro_pic)) No
                                    Profile Picture @else <img
                                            src="{{ asset("user/usr_propic/$userdetail->pro_pic") }}" width="150"
                                            height="150"> @endif
                                </label>
                                <input type="file" name="pro_pic"
                                    class="form-control @error('pro_pic') is-invalid @enderror" placeholder="propic">
                                @error('pro_pic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nama..." value="{{ old('name', $userdetail->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="Username..."
                                    value="{{ old('username', $userdetail->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Work Position:</label>
                                <input type="text" name="work_rank"
                                    class="form-control @error('work_rank') is-invalid @enderror"
                                    placeholder="Work Position..." value="{{ old('work_rank', $userdetail->work_rank) }}">
                                @error('work_rank')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Link Instagram:</label>
                                <input type="text" name="ig_link"
                                    class="form-control @error('ig_link') is-invalid @enderror"
                                    placeholder="Link Instagram..." value="{{ old('ig_link', $userdetail->ig_link) }}">
                                @error('ig_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Link Facebook:</label>
                                <input type="text" name="fb_link"
                                    class="form-control @error('fb_link') is-invalid @enderror"
                                    placeholder="Link Facebook..." value="{{ old('fb_link', $userdetail->fb_link) }}">
                                @error('fb_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email..." value="{{ old('email', $userdetail->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (session('level') === 'admin')
                                <div class="form-group">
                                    <label>Level:</label>
                                    <select name="level" class="form-select">
                                        <option value="admin" {{ $userdetail->level == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="staff" {{ $userdetail->level == 'staff' ? 'selected' : '' }}>Staff
                                        </option>
                                    </select>
                            @endif
                            @error('level')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                            data-bs-target="#ubahPass"><i class="fas fa-key"></i> Change Password</button>
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
    {{-- Start Modal --}}
    <div class="modal fade" id="ubahPass" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/user/modpass/' . $userdetail->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>New Password:</label>
                            <input type="password" name="newpass"
                                class="form-control @error('newpass') is-invalid @enderror">
                            @error('newpass')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Repeat New Password:</label>
                            <input type="password" name="valpass"
                                class="form-control @error('valpass') is-invalid @enderror">
                            @error('valpass')
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
@section('modscript')
    @if (count($errors) > 0)
        <script>
            @if ($errors->has('name') != '1' && $errors->has('username') != '1' && $errors->has('pro_pic') != '1' && $errors->has('work_rank') != '1' && $errors->has('ig_link') != '1' && $errors->has('fb_link') != '1' && $errors->has('email') != '1')
                $(document).ready(function(){
                $("#ubahPass").modal('show');
                });
            @endif

        </script>
    @endif
@endsection
