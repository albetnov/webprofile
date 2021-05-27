<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Announcement</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app.css">
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route('logout') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route('logout') }}">
                <img src="{{ asset('assets') }}/images/logo/logo.png">
            </a>
        </div>
    </nav>
    @if (count($staffanc) == 0)
        <center>
            <p class="text-danger">No data.</p>
        </center>
    @endif
    @foreach ($staffanc as $sa)
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">{{ $sa->info_title }}</h4>
                    <p class="text-muted text-subtitle">Uploaded: {{ $sa->created_at }}</p>
                    <p class="text-muted text-subtitle">Updated: {{ $sa->updated_at }}</p>
                </div>
                <div class="card-body">
                    @empty(!$sa->info_img)
                        <img class="img-fluid" src="{{ asset("staffinfo/$sa->info_img") }}">
                    @endempty
                    <textarea class="form-control" disabled rows="10">{{ $sa->info_desc }}</textarea>
                </div>
            </div>
        </div>
    @endforeach


</body>

</html>
