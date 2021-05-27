@extends('admin.layout.template')
@section('title', 'Manage Staff')
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
                        <h3>Staff List</h3>
                        <p class="text-subtitle text-muted">Control all Staff databases</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Manage Page</li>
                                <li class="breadcrumb-item active" aria-current="page">Change Staff Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Staff Page List <br>
                        <button class="btn btn-primary btn-sm" onclick="location.href='{{ route('addservice') }}';"><i
                                class="fas fa-user-plus"></i>
                            Add Staff</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Staff Image</th>
                                    <th>Staff Title</th>
                                    <th>Staff Descriptions</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicepg as $sp)
                                    <tr>
                                        <td><img src="{{ asset("user/img/$sp->info_img") }}" width="100" height="50">
                                        </td>
                                        <td>{{ $sp->info_title }}</td>
                                        <td>{{ $sp->info_desc }}</td>
                                        <td><button class="btn btn-primary btn-sm"
                                                onclick="location.href='{{ url('admin/page/service/edit/' . $sp->id) }}'"><i
                                                    class="fas fa-edit"></i></button></td>
                                        <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#hapusService{{ $sp->id }}"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                    {{-- Modal Start --}}
                                    <div class="modal fade" id="hapusService{{ $sp->id }}" data-bs-backdrop="static"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete Service, {{ $sp->info_title }} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i
                                                            class="fas fa-times"></i> No, Abort!</button>
                                                    <button type="button"
                                                        onclick="location.href='{{ url('admin/page/service/delete/' . $sp->id) }}';"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i> Yes,
                                                        Delete!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal End --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

    @endsection
    @section('modscript')
        <script>
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);

        </script>
    @endsection
