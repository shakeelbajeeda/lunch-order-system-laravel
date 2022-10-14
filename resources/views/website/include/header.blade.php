<header>
    <!-- Nav Section -->
    <div class="nav">
        <div class="container">
            <div class="nav__wrapper">
                <a href="{{url('/')}}" class="logo">
                    <img src="{{asset('website/images/logo4.png')}}" alt="canteen">
                </a>
                <nav>
                    <div class="nav__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <line x1="3" y1="18" x2="21" y2="18" />
                        </svg>
                    </div>
                    <div class="nav__bgOverlay"></div>
                    <ul class="nav__list">
                        <div class="nav__close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </div>
                        <div class="nav__list__wrapper">

                            <li><a class="nav__link" href="{{url('/')}}">Home</a></li>
{{--                            Director Links--}}
                            @if(auth()->check())
                            @if(auth()->user()->role == 'director')
                                <li><a href="{{route('user.index')}}" class="text-dark fs-3">User Management</a></li>
                                <li><a href="{{route('shop.index')}}" class="text-dark fs-3">Shop Management</a></li>
                                <li><a href="{{route('shopstaff.index')}}" class="text-dark fs-3">ShopStaff Management</a></li>
                                <li><a href="{{route('product.index')}}" class="text-dark fs-3">Master & Beverage</a></li>
                            @endif
                            @if(auth()->user()->role == 'manager')
                                <li><a href="{{route('menu_management')}}" class="text-dark fs-3">Menu Management</a></li>
                                    @php
                                        $shopStaff = \App\Models\ShopManager::where('user_id', auth()->user()->id)->first();
                                        $shop = \App\Models\AusShop::findOrFail($shopStaff->shop_id);
                                    @endphp
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle fs-3 text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Menu
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item fs-3" href="{{route('get_shop_products',[$shop->id])}}">{{$shop->name}}</a>
                                                </li>
                                        </ul>
                                    </li>
                            @endif
                            @if(auth()->user()->role == 'manager' || auth()->user()->role == 'shop_staff')
                                <li><a href="{{route('shop_order_history')}}" class="text-dark fs-3">My Shop Order History</a></li>
                            @endif
                                @if(auth()->user()->role == 'user' || auth()->user()->role == 'employee' || auth()->user()->role == 'student')
                                    <li><a href="{{route('order_history')}}" class="text-dark fs-3">My Order History</a></li>
                                    <li><a href="{{route('deposit_payments')}}" class="text-dark fs-3">Deposit Payment</a></li>
                                @endif
                            @endif
                            @if(!auth()->user() || auth()->user()->role == 'user' || auth()->user()->role == 'employee' || auth()->user()->role == 'student')
                                @php
                                    $shops = \App\Models\AusShop::all();
                                @endphp
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle fs-3 text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menu
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($shops as $shop)
                                            <li><a class="dropdown-item fs-3" href="{{route('get_shop_products',[$shop->id])}}">{{$shop->name}}</a>
                                            </li>
                                            <hr>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @if(auth()->user())
                                <li class="fs-3 ms-5">{{auth()->user()->name}}</li>
                                <li><a href="{{route('logout')}}" class="btn btn-danger fs-3">Logout</a></li>
                            @else
                                <li><a href="{{route('login')}}" class="btn btn-primary ms-5 fs-3">Login</a></li>
                                <li><a href="{{route('register')}}" class="btn btn-primary fs-3">Registration</a></li>
                            @endif
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Nav Section -->
</header>
