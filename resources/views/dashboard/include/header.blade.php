<!-- Page Wrapper -->
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

<div class="container">
    <div class="row pt-5">
        <div class="col-md-3 pt-4">
            <ul class="list-unstyled bg-secondary rounded">
                <li class="nav-item active">
                    <a class="nav-link text-white text-white" href="{{ url('/dashboard') }}">
                        <i class="fas fa-fw fa-balance-scale"></i>
                        <span>Dashboard</span></a>
                </li>
                <!-- Nav Item - Admin Dashboard -->
                @auth
                    @if(auth()->user()->user_type == 'service_manager')
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="{{ route('renewable-energy-type.index') }}">
                                <i class="fas fa-fw fa-solar-panel"></i>
                                <span>Master Trading</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="{{ route('users.index') }}">
                                <i class="fas fa-fw fa-users"></i>
                                <span>User Management</span></a>
                        </li>
                    @endif
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="{{ route('trading-history') }}">
                            <i class="fas fa-fw fa-history"></i>
                            <span>Trading History</span></a>
                    </li>
                    @if(auth()->user()->user_type !== 'buyer')
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="{{ route('renewable-energies.index') }}">
                                <i class="fas fa-fw fa-bolt"></i>
                                <span>Renewable Energy</span></a>
                        </li>
                    @endif
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="{{ url('/profile') }}">
                            <i class="fas fa-fw fa-user"></i>
                            <span>My Profile</span></a>
                    </li>
                @endauth
            </ul>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
