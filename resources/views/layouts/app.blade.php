<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TaGET</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
<!-- Navigation menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('image/logo.png')}}" alt="TaGET Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/') }}">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/trading') }}"><strong>Trading</strong></a>
            </li>
            @if(auth()->check() && (auth()->user()->user_type == 'seller' || auth()->user()->user_type == 'service_manager'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/renewable-energies') }}"><strong>Sell Energy</strong></a>
            </li>
            @endif
            @if(auth()->check() && auth()->user()->user_type == 'service_manager')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/renewable-energy-type') }}"><strong>Master Trading</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users') }}"><strong>User Management</strong></a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/trading-history') }}"><strong>Trading History</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profile') }}"><strong>Profile</strong></a>
            </li>
        </ul>
    </div>
    <!-- Login and Signup section -->
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ms-auto">

        <!-- Authentication Links -->
        @guest

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><strong>Login</strong></a></li></a>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}"><strong>Register</strong></a></a>
            </li>

        @else

            <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('logout')}}"
                       onclick="event.preventDefault();
							document.getElementById('logout-form'.submit();">
                        {{ __('Logout')}}
                    </a>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-center" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>


                </div>
            </li>
        @endguest
    </ul>
    </div>
</nav>
<main class="py-4">
    @yield('content')
</main>
</div>

<!-- Javascript files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<!-- javascript -->
<script src="js/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>
