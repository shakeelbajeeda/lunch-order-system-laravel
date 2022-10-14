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
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="">
                <!-- Logo icon -->
                <b class="logo-icon ps-2">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img
                        src="{{asset('dashboard/assets/images/logo-icon.png')}}"
                        alt="homepage"
                        class="light-logo"
                        width="25"
                    />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text ms-2">
                           Dashboard
                         </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
                class="nav-toggler waves-effect waves-light d-block d-md-none"
                href="javascript:void(0)"
            ><i class="ti-menu ti-close"></i
                ></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
        >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
                <li class="nav-item d-none d-lg-block">
                    <a
                        class="nav-link sidebartoggler waves-effect waves-light"
                        href="javascript:void(0)"
                        data-sidebartype="mini-sidebar"
                    ><i class="mdi mdi-menu font-24"></i
                        ></a>
                </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item search-box">
                    <a
                        class="nav-link waves-effect waves-dark"
                        href="{{url('/')}}"
                    >Go To Website</a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="mt-4 text-light">
                    {{auth()->user()->name}}
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="{{asset('dashboard/assets/images/users/1.jpg')}}"
                            alt="user"
                            class="rounded-circle"
                            width="31"
                        />
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end user-dd animated"
                        aria-labelledby="navbarDropdown"
                    >
                        @if(auth()->user()->role == 'user' || auth()->user()->role == 'employee' || auth()->user()->role == 'student')
                            <a class="dropdown-item" href="javascript:void(0)"
                            ><i class="mdi mdi-wallet me-1 ms-1"></i> My Balance</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}"
                        ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                        >
                        <div class="dropdown-divider"></div>
                    </ul>
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
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                @if(auth()->user()->role == 'director')
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{route('user.index')}}"
                            aria-expanded="false"
                        ><i class="mdi mdi-view-dashboard"></i
                            ><span class="hide-menu">User Management</span></a
                        >
                    </li>
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{route('shop.index')}}"
                            aria-expanded="false"
                        ><i class="mdi mdi-chart-bar"></i
                            ><span class="hide-menu">Shop Management</span></a
                        >
                    </li>
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{route('shopstaff.index')}}"
                            aria-expanded="false"
                        ><i class="mdi mdi-chart-bubble"></i
                            ><span class="hide-menu">ShopStaff Management</span></a
                        >
                    </li>
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{route('product.index')}}"
                            aria-expanded="false"
                        ><i class="mdi mdi-border-inside"></i
                            ><span class="hide-menu">Master Food and Beverage List</span></a
                        >
                    </li>
                @endif
                @if(auth()->user()->role == 'manager')
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{route('menu_management')}}"
                                aria-expanded="false"
                            ><i class="mdi mdi-border-inside"></i
                                ><span class="hide-menu">Menu Management Page</span></a
                            >
                        </li>
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{route('masterFoodList')}}"
                                aria-expanded="false"
                            ><i class="mdi mdi-table"></i
                                ><span class="hide-menu">Master & Beverage Food List</span></a
                            >
                        </li>
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{route('shop_order_history')}}"
                                aria-expanded="false"
                            ><i class="mdi mdi-history"></i
                                ><span class="hide-menu">Order History</span></a
                            >
                        </li>
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{route('shop_time_index')}}"
                                aria-expanded="false"
                            ><i class="mdi mdi-update"></i
                                ><span class="hide-menu">Update Shop Time</span></a
                            >
                        </li>
                @endif
                @if(auth()->user()->role == 'user' || auth()->user()->role == 'employee' || auth()->user()->role == 'student')
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{route('deposit_payments')}}"
                                aria-expanded="false"
                            ><i class="mdi mdi-bank"></i
                                ><span class="hide-menu">Deposit Funds</span></a
                            >
                        </li>
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{route('order_history')}}"
                                aria-expanded="false"
                            ><i class="mdi mdi-eye"></i
                                ><span class="hide-menu">My Order History</span></a
                            >
                        </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
