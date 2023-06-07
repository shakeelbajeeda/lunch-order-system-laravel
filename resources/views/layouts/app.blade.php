<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Renewable Energy Trading System</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="{{ asset('website/dashboard-vendor/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('website/dashboard-js/demo/chart-area-demo.js') }}"></script>
    <link rel="stylesheet" href="{{asset('website/CSS/style.css')}}">
</head>
<body>
<!-- Navigation menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">TaGET</a>
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
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/dashboard') }}"><strong>Dashboard</strong></a>
            </li>
            @endauth
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
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/trading-history') }}"><strong>Trading History</strong></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profile') }}"><strong>Profile</strong></a>
            </li>
            @endauth
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
</body>
</html>
