<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Favicon icon -->
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{asset('dashboard/assets/images/favicon.png')}}"
    />
    <!-- Custom CSS -->
    <link href="{{asset('dashboard/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('dashboard/dist/css/style.min.css')}}" rel="stylesheet" />
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body>
<div
    id="main-wrapper"
    data-layout="vertical"
    data-navbarbg="skin5"
    data-sidebartype="full"
    data-sidebar-position="absolute"
    data-header-position="absolute"
    data-boxed-layout="full"
>
    @include('dashboard.include.header')
    <div class="page-wrapper">
    @yield('content')
    </div>
    @include('dashboard.include.footer')
</div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('dashboard/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('dashboard/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('dashboard/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('dashboard/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dashboard/dist/js/custom.min.js')}}"></script>
    <!-- Charts js Files -->
    <script src="{{asset('dashboard/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('dashboard/dist/js/pages/chart/chart-page-init.js')}}"></script>
</body>
</html>
