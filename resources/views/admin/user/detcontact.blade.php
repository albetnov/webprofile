@extends('admin.layout.template')
@section('title', 'Contact Detail')
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
                        <h3>Contact Detail</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admdashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Contact</li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $detcontact->name_contact }}</h4>
                        <p class="text-subtitle text-muted"><a
                                href="mailto:{{ $detcontact->email_contact }}">{{ $detcontact->email_contact }}</a></p>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Subject: </span>
                            <input type="text" class="form-control" disabled value="{{ $detcontact->subject_contact }}">
                        </div>
                        <textarea class="form-control" rows="10" disabled>{{ $detcontact->message_contact }}</textarea>
                    </div>
                    <div class="card-footer">
                        <button type="button" onclick="history.back()" class="btn btn-sm btn-secondary"><i
                                class="fas fa-arrow-left"></i></button>
                    </div>
                </div>
            </section>
        </div>
    @endsection
