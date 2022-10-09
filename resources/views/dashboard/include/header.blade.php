<!-- Page Wrapper -->
{{--<div id="wrapper">--}}

{{--    <!-- Sidebar -->--}}
{{--    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">--}}

{{--        <!-- Sidebar - Brand -->--}}
{{--        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">--}}
{{--            <div class="sidebar-brand-icon rotate-n-15">--}}
{{--                <i class="fas fa-laugh-wink"></i>--}}
{{--            </div>--}}
{{--            <div class="sidebar-brand-text mx-3">Dashboard</div>--}}
{{--        </a>--}}

{{--        <!-- Divider -->--}}
{{--        <hr class="sidebar-divider my-0">--}}

{{--        <!-- Nav Item - Admin Dashboard -->--}}
{{--        @if(auth()->user()->role == 'director')--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('user.index')}}">--}}
{{--                    <i class="fas fa-fw fa-cog"></i>--}}
{{--                    <span>User Management Page</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('shop.index')}}">--}}
{{--                    <i class="fas fa-fw fa-wrench"></i>--}}
{{--                    <span>Shop Management</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('shopstaff.index')}}">--}}
{{--                    <i class="fas fa-fw fa-wrench"></i>--}}
{{--                    <span>ShopStaff Management</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('product.index')}}">--}}
{{--                    <i class="fa fa-plus"></i>--}}
{{--                    <span>MASTER FOOD & BEVERAGE List</span></a>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--        <!-- End Nav Item - Admin Dashboard -->--}}

{{--        <!-- Nav Item - Manager Dashboard -->--}}
{{--        @if(auth()->user()->role == 'manager')--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('menu_management')}}">--}}
{{--                    <i class="fas fa-fw fa-cog"></i>--}}
{{--                    <span>Menu Management Page</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('masterFoodList')}}">--}}
{{--                    <i class="fa fa-plus"></i>--}}
{{--                    <span>MASTER FOOD & BEVERAGE List</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('shop_order_history')}}">--}}
{{--                    <i class="fa fa-eye"></i>--}}
{{--                    <span>View Order History</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('shop_time_index')}}">--}}
{{--                    <i class="fas fa-fw fa-wrench"></i>--}}
{{--                    <span>Change Shop Time</span></a>--}}
{{--            </li>--}}

{{--        @endif--}}
{{--        <!-- End Nav Item - Manager Dashboard -->--}}
{{--        <!-- Nav Item - ShopStaff Dashboard -->--}}
{{--        @if(auth()->user()->role == 'shop_staff')--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('shop_order_history')}}">--}}
{{--                    <i class="fa fa-eye"></i>--}}
{{--                    <span>View Order History</span></a>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--        <!-- End Nav Item - ShopStaff Dashboard -->--}}

{{--        <!-- Nav Item - User Dashboard -->--}}
{{--        @if(auth()->user()->role == 'user')--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('deposit_payments')}}">--}}
{{--                    <i class="fas fa-fw fa-cog"></i>--}}
{{--                    <span>Deposit Payments</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('order_history')}}">--}}
{{--                    <i class="fa fa-eye-dropper"></i>--}}
{{--                    <span>View Order History</span></a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        <!-- End Nav Item - User Dashboard -->--}}

{{--        <!-- Divider -->--}}
{{--        <hr class="sidebar-divider">--}}


{{--        <!-- Divider -->--}}
{{--        <hr class="sidebar-divider d-none d-md-block">--}}

{{--        <!-- Sidebar Toggler (Sidebar) -->--}}
{{--        <div class="text-center d-none d-md-inline">--}}
{{--            <button class="rounded-circle border-0" id="sidebarToggle"></button>--}}
{{--        </div>--}}
{{--    </ul>--}}

{{--    <div id="content-wrapper" class="d-flex flex-column">--}}

{{--        <!-- Main Content -->--}}
{{--        <div id="content">--}}

{{--            <!-- Topbar -->--}}
{{--            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">--}}

{{--                <!-- Sidebar Toggle (Topbar) -->--}}
{{--                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">--}}
{{--                    <i class="fa fa-bars"></i>--}}
{{--                </button>--}}

{{--                <!-- Topbar Search -->--}}
{{--                <div>--}}
{{--                    <a href="{{url('/')}}">Go Website</a>--}}
{{--                </div>--}}

{{--                <!-- Topbar Navbar -->--}}
{{--                <ul class="navbar-nav ml-auto">--}}

{{--                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->--}}
{{--                    <li class="nav-item dropdown no-arrow d-sm-none">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"--}}
{{--                             aria-labelledby="searchDropdown">--}}
{{--                            <form class="form-inline mr-auto w-100 navbar-search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control bg-light border-0 small"--}}
{{--                                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <button class="btn btn-primary" type="button">--}}
{{--                                            <i class="fas fa-search fa-sm"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <div class="topbar-divider d-none d-sm-block"></div>--}}

{{--                    <!-- Nav Item - User Information -->--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            {{auth()->user()->name}}--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - User Information -->--}}
{{--                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
{{--                             aria-labelledby="userDropdown">--}}
{{--                            <a class="dropdown-item" href="{{ route('logout') }}">--}}
{{--                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>--}}
{{--                                Logout--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                </ul>--}}

{{--            </nav>--}}
{{--            <!-- End of Topbar -->--}}

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin6">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="dashboard.html">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="{{asset('dashboard/plugins/images/logo-icon.png')}}" alt="homepage" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="text-dark h3 mt-3 fw-bold">
                            <!-- dark Logo text -->
                            Dashboard
                        </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                   href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <!-- Nav Item - User Information -->--}}
                                        <li class="nav-item me-3 h4 text-light">
{{--                                                {{auth()->user()->name}}--}} shakeel
                                        </li>
                    <li class="nav-item text-light me-4 h4">
                        <a href="{{route('logout')}}"> Logout</a>
                    </li>

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.html"
                           aria-expanded="false">
                            <i class="far fa-clock" aria-hidden="true"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.html"
                           aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.html"
                           aria-expanded="false">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span class="hide-menu">Basic Table</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="fontawesome.html"
                           aria-expanded="false">
                            <i class="fa fa-font" aria-hidden="true"></i>
                            <span class="hide-menu">Icon</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="map-google.html"
                           aria-expanded="false">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            <span class="hide-menu">Google Map</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html"
                           aria-expanded="false">
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span class="hide-menu">Blank Page</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="404.html"
                           aria-expanded="false">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <span class="hide-menu">Error 404</span>
                        </a>
                    </li>
                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

