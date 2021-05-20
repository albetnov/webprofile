@extends('admin.layout.template')
@section('title', 'Uji Coba')
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
                    <h3>Test Page</h3>
                    <p class="text-subtitle text-muted">
                       Ini contoh testing
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav
                        aria-label="breadcrumb"
                        class="breadcrumb-headerfloat-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Test Page
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hai, {{ session('nama') }}</h4>
                </div>
                <div class="card-body">
                    Kamu berhasil login sebagai {{ session('level') }}
                </div>
                <button class="btn btn-primary btn-sm" onclick="location.href='{{ route('logout') }}'">Logout</button>
            </div>
        </section>
    </div>
    @endsection
