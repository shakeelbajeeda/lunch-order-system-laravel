<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="text-center navbar-nav bg-gradient-success text-white sidebar sidebar-success accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-text text-white mx-3 mt-3"><img src="{{ asset('website/images/new-logo') }}"  alt=""></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
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

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-success topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <div>
                    <a href="{{url('/')}}" class="text-white btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Go To Website</a>
                </div>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <!-- Dropdown - User Information -->
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
                </ul>

            </nav>
            <!-- End of Topbar -->
