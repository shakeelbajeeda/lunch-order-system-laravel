<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="70%" src="{{ asset('website/images/new-logo') }}"
                                                               alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex justify-content-around" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"> Search Energy </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('trading') ? 'active' : '' }}"
                           href="{{ url('/view-trading') }}">Trading Energy List</a>
                    </li>
                    @if(auth()->check() && auth()->user()->role == 'service_manager')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all-energy-types.index') }}">Master Trading</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                </ul>
                @guest
                    <div class="navbar-nav mr-auto text-right mt-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-success mt-sm-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-success ms-md-3 mt-sm-2">Register</a>
                    </div>
                @else
                    <li class="nav-item list-unstyled">
                        <a class="dropdown-item px-4 py-2 bg-success text-white shadow-lg rounded" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </div>
        </div>
    </nav>
</header>
