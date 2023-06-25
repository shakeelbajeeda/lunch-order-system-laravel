<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
    <link href="{{ asset('dashboard/dashboard-vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
          type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../pages/images/small-icon.png">

    <!-- Custom styles for this template-->
    <link href="{{ asset('dashboard/dashboard-css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        .form-control:focus {
            border-color: #28a745;
            box-shadow: inset 0 1px 1px #28a745, 0 0 8px #28a745;
        }
    </style>
</head>

<body>
@include('website.include.header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 text-center">
            @include('dashboard.include.header')
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
@include('dashboard.include.footer')
@yield('scripts')
</body>
</html>
