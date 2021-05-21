<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.svg" type="image/x-icon" />
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ route('admdashboard') }}"> <img
                                    src="{{ asset('assets') }}/images/logo/logo.png" alt="Logo" srcset="" /></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"> <i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->is('admin/dashboard') ? ' active' : '' }}">
                            <a href="{{ route('admdashboard') }}" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub {{ request()->is('admin/user*') ? ' active' : '' }}">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-user"></i>
                                <span>Manage User</span>
                            </a>
                            <ul class="submenu {{ request()->is('admin/user*') ? ' active' : '' }}">
                                <li class="submenu-item {{ request()->is('admin/useracc') ? ' active' : '' }}">
                                    <a href="{{ route('useracc') }}">User Account</a>
                                </li>
                                <li
                                    class="submenu-item {{ request()->is('admin/user/viscontact*') ? ' active' : '' }}">
                                    <a href="{{ route('viscontact') }}">Visitor Contact</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x">
                    <i data-feather="x"></i>
                </button>
            </div>
        </div>
        @yield('content')
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Admin Panel</p>
                </div>
                <div class="float-end">
                    <p>Crafted with Robby and Albet Novendo</p>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets') }}/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/main.js"></script>
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    @yield('modscript')
    <script>
        @if (session('pesan'))
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
            toastr["{{ session('alert') }}"]("{{ session('pesan') }}")
        @endif

    </script>
</body>

</html>
