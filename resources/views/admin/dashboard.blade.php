@extends('admin.layout.template')
@section('title', 'Dashboard')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Profile Statistics, {{ session('nama') }}</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">User Account</h6>
                                            <h6 class="font-extrabold mb-0">{{ $usertotal }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Contacts Message</h6>
                                            <h6 class="font-extrabold mb-0">{{ $mestotal }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Account Settings</div>
                        <div class="card-body">
                            <form action="{{ route('modcuracc') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username', $userdetail->username) }}" placeholder="Username">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $userdetail->name) }}" placeholder="Name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="work_rank"
                                        class="form-control @error('work_rank') is-invalid @enderror"
                                        value="{{ old('work_rank', $userdetail->work_rank) }}"
                                        placeholder="Work Position">
                                    @error('work_rank')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="ig_link"
                                        class="form-control @error('ig_link') is-invalid @enderror"
                                        value="{{ old('ig_link', $userdetail->ig_link) }}" placeholder="Link Instagram">
                                    @error('ig_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="fb_link"
                                        class="form-control @error('fb_link') is-invalid @enderror"
                                        value="{{ old('fb_link', $userdetail->fb_link) }}" placeholder="Link Facebook">
                                    @error('fb_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Profile Picture:</label><br>
                                    <label>Current: @if (empty($userdetail->pro_pic)) No
                                        Profile Picture @else <img
                                                src="{{ asset("user/usr_propic/$userdetail->pro_pic") }}" width="80"
                                                height="80"> @endif
                                    </label>
                                    <input type="file" name="pro_pic"
                                        class="form-control @error('pro_pic') is-invalid @enderror" placeholder="propic">
                                    @error('pro_pic')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#editPassword"><i class="fas fa-key"></i> Change Password</button>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editEmail"><i class="fas fa-envelope"></i> Change Email</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Edit
                                        Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Modal Start Password --}}
                    <div class="modal fade" id="editPassword" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('modcurpass') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Current Password:</label>
                                            <input type="password" name="curpass"
                                                class="form-control @error('curpass') is-invalid @enderror">
                                            @error('curpass')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                    {{-- Modal End Password --}}
                    {{-- Modal Start Email --}}
                    <div class="modal fade" id="editEmail" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Email</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('modcurmail') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" value="{{ old('email', $userdetail->email) }}">
                                            @error('email')
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
                    {{-- Modal End Email --}}
                @endsection
                @section('modscript')
                    @if (count($errors) > 0)
                        <script>
                            @if ($errors->has('name') != '1' && $errors->has('username') != '1' && $errors->has('pro_pic') != '1' && $errors->has('work_rank') != '1' && $errors->has('ig_link') != '1' && $errors->has('fb_link') != '1' && $errors->has('email') != '1')
                                $(document).ready(function(){
                                $("#editPassword").modal('show');
                                });
                            @endif
                            @error('email')
                                $(document).ready(function(){
                                $("#editEmail").modal('show');
                                })
                            @enderror

                        </script>
                    @endif
                @endsection
