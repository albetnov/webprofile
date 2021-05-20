<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/auth.css">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <img src="{{ asset('assets') }}/images/logo/logo.png" alt="Logo" />
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
                    <form action="{{ route('login_akun') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" value="{{ old('username') }}" class="form-control form-control-xl @error('username') is-invalid @enderror" name="username" placeholder="Username" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">
                            Log in
                        </button>
                        <button type="button" location.href="{{ route('home') }}" class="btn btn-primary btn-block btn-lg shadow-lg mt-3">
                            Back
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <script type="text/javascript">
        @if (session('pesan'))
            toastr.options = {
            "closeButton": true,
            "debug": true,
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
</html>
