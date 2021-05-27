@extends('admin.layout.template')
@section('title', 'Manage Staff Announcement')
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
                        <p class="text-subtitle text-muted">Control all Staff Announcement databases</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Staff Announcement</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Staff Announcement Page List <br>
                        <button class="btn btn-primary btn-sm" onclick="location.href='{{ route('addstaffanc') }}';"><i
                                class="fas fa-user-plus"></i>
                            Add Announcement</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Announcement Image</th>
                                    <th>Announcement Title</th>
                                    <th>Announcement Descriptions</th>
                                    <th>Created At:</th>
                                    <th>Update At:</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staff as $sp)
                                    <tr>
                                        <td><img src="{{ asset("staffinfo/$sp->info_img") }}" alt="no photo" width="100"
                                                height="50">
                                        </td>
                                        <td>{{ $sp->info_title }}</td>
                                        <td>{{ $sp->info_desc }}</td>
                                        <td>{{ $sp->created_at }}</td>
                                        <td>{{ $sp->updated_at }}</td>
                                        <td><button class="btn btn-primary btn-sm"
                                                onclick="location.href='{{ url('admin/staff/edit/' . $sp->id) }}'"><i
                                                    class="fas fa-edit"></i></button></td>
                                        <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#hapusInfo{{ $sp->id }}"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                    {{-- Modal Start --}}
                                    <div class="modal fade" id="hapusInfo{{ $sp->id }}" data-bs-backdrop="static"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete Announcement, {{ $sp->info_title }} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i
                                                            class="fas fa-times"></i> No, Abort!</button>
                                                    <button type="button"
                                                        onclick="location.href='{{ url('admin/staff/delete/' . $sp->id) }}';"
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
