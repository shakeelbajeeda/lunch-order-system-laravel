<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Dashboard</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Admin Dashboard -->
        @if(auth()->user()->role == 'director')
            <li class="nav-item active">
                <a class="nav-link" href="{{route('user.index')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>User Management Page</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('shop.index')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Shop Management</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('shopstaff.index')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>ShopStaff Management</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('product.index')}}">
                    <i class="fa fa-plus"></i>
                    <span>MASTER FOOD & BEVERAGE List</span></a>
            </li>
        @endif
        <!-- End Nav Item - Admin Dashboard -->

        <!-- Nav Item - Manager Dashboard -->
        @if(auth()->user()->role == 'manager')
            <li class="nav-item active">
                <a class="nav-link" href="{{route('menu_management')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Menu Management Page</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('masterFoodList')}}">
                    <i class="fa fa-plus"></i>
                    <span>MASTER FOOD & BEVERAGE List</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('shop_order_history')}}">
                    <i class="fa fa-eye"></i>
                    <span>View Order History</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('shop_time_index')}}">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Change Shop Time</span></a>
            </li>

        @endif
        <!-- End Nav Item - Manager Dashboard -->
        <!-- Nav Item - ShopStaff Dashboard -->
        @if(auth()->user()->role == 'shop_staff')
            <li class="nav-item active">
                <a class="nav-link" href="{{route('shop_order_history')}}">
                    <i class="fa fa-eye"></i>
                    <span>View Order History</span></a>
            </li>
        @endif
        <!-- End Nav Item - ShopStaff Dashboard -->

        <!-- Nav Item - User Dashboard -->
        @if(auth()->user()->role == 'user' || auth()->user()->role = 'employee')
            <li class="nav-item active">
                <a class="nav-link" href="{{route('deposit_payments')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Deposit Payments</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('order_history')}}">
                    <i class="fa fa-eye-dropper"></i>
                    <span>View Order History</span></a>
            </li>
        @endif

        <!-- End Nav Item - User Dashboard -->

        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <div>
                    <a href="{{url('/')}}">Go Website</a>
                </div>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
