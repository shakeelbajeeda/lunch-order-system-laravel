<!doctype html>
<html lang="en">
<head>
    <title>Tassie Green Energy Trading Company</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{ asset('website/styles/index.css')  }}">
    <script src="{{ asset('website/js/index.js') }}"></script>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">TaGet</a>
            @guest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            @else
                <li class="nav-item dropdown d-lg-none">
                    <a id="navbarDropdown" style="margin-top: -20px" class="nav-link dropdown-toggle text-white" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
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
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('trading*')) ? 'active' : '' }}" href="{{ url('/trading') }}">Trading</a>
                    </li>
                    @if(auth()->check() && auth()->user()->user_type == 'service_manager')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('renewable-energy-type') }}">Master Trading</a>
                        </li>
                    @endif
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @endauth
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav me-auto mb-2">
                        @guest
                            <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                            <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}"
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
                    </ul>
                </span>
            </div>
        </div>
    </nav>
</header>
<div>
    @yield('content')
</div>
</body>
<script>
    $(document).ready(function () {
        $('#eye-icon').click(function () {
            if ($('#eye-icon').hasClass('fa fa-eye-slash')) {
                $('#eye-icon').removeClass('fa fa-eye-slash');
                $('#eye-icon').addClass('fa fa-eye');
                $('#password').attr('type', 'text');
            } else {
                $('#eye-icon').removeClass('fa fa-eye');
                $('#eye-icon').addClass('fa fa-eye-slash');
                $('#password').attr('type', 'password');
            }
        })
    });

    Array.from(document.querySelectorAll('.trading-option-button')).forEach(btn =>
        btn?.addEventListener('click', e => {
            const text = e.target.textContent.toLowerCase().trim()

            if (document.querySelector(`.${text}-btn`).classList.contains('active'))
                return

            document.querySelector('.buy').classList.toggle('d-none')
            document.querySelector('.buy-btn').classList.toggle('active')

            document.querySelector('.sell').classList.toggle('d-none')
            document.querySelector('.sell-btn').classList.toggle('active')
            // }
        })
    )

    Array.from(document.querySelectorAll('.master')).forEach(btn =>
        btn?.addEventListener('click', e => {
            const name = e.target.dataset.name

            if (document.querySelector('.active').dataset.name === name) return

            document.querySelector('.sell').classList.toggle('d-none')
            document.querySelector('.manage').classList.toggle('d-none')

            document.querySelectorAll('.master')[0].classList.toggle('active')
            document.querySelectorAll('.master')[1].classList.toggle('active')
        })
    )
</script>
</html>
