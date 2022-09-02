<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>UTAS - Lunch</title>
</head>
<body>
@include('website.include.header')
<div class="header-bg vh-50 d-flex">
    <div class="container m-auto">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<!-- Section Start Here -->
<section>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 pb-3">
                <div class="fs-2">Dashboard</div>
            </div>
            <div class="col-md-3">
                <div class="rounded py-3 side-bar-bg px-2">
                    <ul class="list-unstyled">
                        <li class="mt-2"><a href="{{route('users.index')}}" class="text-decoration-none text-dark fs-5" >User Management Page</a></li>
                        <li class="mt-2"><a href="{{route('shops.create')}}" class="text-decoration-none text-dark fs-5" >Add Shop</a></li>
                        <li class="mt-2"><a href="{{route('shops.index')}}" class="text-decoration-none text-dark fs-5" >Shop List</a></li>
                        <li class="mt-2"><a href="{{route('shopStaff.create')}}" class="text-decoration-none text-dark fs-5" >Add Shop Staff</a></li>
                        <li class="mt-2"><a href="{{route('shopStaff.index')}}" class="text-decoration-none text-dark fs-5" >View All Shop Staff</a></li>
                    </ul>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</section>
@include('website.include.footer')
</body>
</html>
