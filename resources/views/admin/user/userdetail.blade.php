@extends('admin.layout.template')
@section('title', 'Detail User')
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
                        <h3>Detail User</h3>
                        <p class="text-subtitle text-muted">Detailed information about user.</p>
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
                        <h4 class="card-title">{{ $userdetail->name }}</h4>
                    </div>
                    <div class="card-body">
                        <p>Profile Picture:</p>
                        <p>Current: <br>
                            @if (empty($userdetail->pro_pic)) No
                            Profile Picture @else <img src="{{ asset("user/usr_propic/$userdetail->pro_pic") }}"
                                    width="150" height="150"> @endif
                        </p>
                        <p>Nama: {{ $userdetail->name }}</p>
                        <p>Username: {{ $userdetail->username }}</p>
                        <p>Work Position: {{ $userdetail->work_rank }}</p>
                        <p>Link Instagram: <a href="{{ $userdetail->ig_link }}">{{ $userdetail->ig_link }}</a></p>
                        <p>Link Facebook: <a href="{{ $userdetail->fb_link }}">{{ $userdetail->fb_link }}</a></p>
                        <p>Email: {{ $userdetail->email }}</p>
                        <p>Level: {{ $userdetail->level }}</p>
                        <button type="button" onclick="location.href='{{ route('useracc') }}'"
                            class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i></button>
                    </div>
                </div>
            </section>
        </div>
    @endsection
