<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('website/images/wind-energy.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex justify-content-around" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"> Search </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('trading') ? 'active' : '' }}" href="{{ url('/trading') }}">Trading</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Master Trading</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    @endauth
                </ul>
                @guest
                <div class="navbar-nav mr-auto text-right mt-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-success mt-sm-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-success ms-md-3 mt-sm-2">Register</a>
                </div>
                @else
                    <li class="nav-item dropdown list-unstyled">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </div>
    </nav>
</header>
