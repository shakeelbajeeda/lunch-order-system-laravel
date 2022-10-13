<header class="bg-secondary">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}">
            <span class="text-light">
              Tasmania Lunch Order System
            </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    @if(auth()->check())
                        @if(auth()->user()->role == 'manager' || auth()->user()->role == 'shop_staff')
                            @php
                                $shopStaff = \App\Models\ShopManager::where('user_id', auth()->user()->id)->first();
                                $shop = \App\Models\AusShop::where('id', $shopStaff->shop_id)->first();
                            @endphp
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                           href="{{route('get_shop_products', [$shop->id])}}">{{$shop->name}}</a></li>
                                </ul>
                            </li>
                        @endif
                    @endif

                    @if(!auth()->user() || auth()->user()->role == 'user' || auth()->user()->role == 'student' || auth()->user()->role == 'employee')
                        @php
                            $shops = \App\Models\AusShop::all();
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($shops as $shop)
                                    <li><a class="dropdown-item"
                                           href="{{route('get_shop_products',[$shop->id])}}">{{$shop->name}}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    @if(auth()->check())
                        @if(auth()->user()->role == 'director')
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('product.index')}}">MASTER FOOD & BEVERAGE
                                    LIST</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('user.index')}}">Dashboard</a>
                            </li>
                        @endif
                        @if(auth()->user()->role == 'manager' || auth()->user()->role == 'shop_staff')
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('shop_order_history')}}">Dashboard</a>
                            </li>
                        @endif
                        @if(auth()->user()->role == 'user' || auth()->user()->role == 'student' || auth()->user()->role == 'employee')
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('deposit_payments')}}">Dashboard</a>
                            </li>
                        @endif
                    @endif
                </ul>
                <div class="user_option">
                    <ul class="navbar-nav float-right me-5">
                        @if(auth()->user())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    {{auth()->user()->name}}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item text-danger" href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white btn btn-info px-3                                                                                                                              "
                                   href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item ms-3">
                                <a class="nav-link text-white btn btn-info px-4"
                                   href="{{route('register')}}">Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
