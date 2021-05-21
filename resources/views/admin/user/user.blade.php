@extends('admin.layout.template')
@section('title', 'Manage User')
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
                        <h3>User Account</h3>
                        <p class="text-subtitle text-muted">Control all user databases</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admdashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Manage User</li>
                                <li class="breadcrumb-item active" aria-current="page">User Account</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        User Account List <br>
                        <button class="btn btn-primary btn-sm" onclick="location.href='{{ route('adduser') }}';"><i
                                class="fas fa-user-plus"></i>
                            Add User</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Work Position</th>
                                    <th>Created At</th>
                                    <th>Update At</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userlist as $ul)
                                    <tr>
                                        <td>{{ $ul->name }}</td>
                                        <td>{{ $ul->username }}</td>
                                        <td>{{ $ul->work_rank }}</td>
                                        <td>{{ $ul->created_at }}</td>
                                        <td>{{ $ul->updated_at }}</td>
                                        <td><button class="btn btn-primary btn-sm"
                                                onclick="location.href='{{ url('admin/user/detail/' . $ul->id) }}'"><i
                                                    class="fas fa-eye"></i></button></td>
                                        <td><button class="btn btn-info btn-sm"
                                                onclick="location.href='{{ url('admin/user/edit/' . $ul->id) }}'"><i
                                                    class="fas fa-user-edit"></i></button></td>
                                        <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#hapusUser{{ $ul->id }}"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                    {{-- Modal Start --}}
                                    <div class="modal fade" id="hapusUser{{ $ul->id }}" data-bs-backdrop="static"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete user, {{ $ul->name }} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i
                                                            class="fas fa-times"></i> No, Abort!</button>
                                                    <button type="button"
                                                        onclick="location.href='{{ url('admin/user/del/' . $ul->id) }}';"
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
