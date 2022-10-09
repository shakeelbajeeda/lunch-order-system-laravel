<nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{url('/')}}">Lunch Order System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                @if(!auth()->user() || auth()->user()->role == 'user')
                    @php
                    $shops = \App\Models\Shop::all();
                    @endphp
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($shops as $shop)
                            <li><a class="dropdown-item" href="{{route('get_shop_products',[$shop->id])}}">{{$shop->name}}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                @if(auth()->check())
                @if(auth()->user()->role == 'manager' || auth()->user()->role == 'shop_staff')
                    @php
                        $shopStaff = \App\Models\ShopStaff::where('user_id', auth()->user()->id)->first();
                        $shop = \App\Models\Shop::where('id', $shopStaff->shop_id)->first();
                    @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('get_shop_products', [$shop->id])}}">{{$shop->name}}</a></li>
                    </ul>
                </li>
                @endif
                @endif
                @if(auth()->check())
                    @if(auth()->user()->role == 'director')
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('product.index')}}">MASTER FOOD & BEVERAGE LIST</a>
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
                    @if(auth()->user()->role == 'user')
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('deposit_payments')}}">Dashboard</a>
                            </li>
                    @endif
                @endif
            </ul>
            <ul class="navbar-nav float-right me-5">
                @if(auth()->user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-danger" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white btn btn-primary" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link text-white btn btn-primary" href="{{route('register')}}">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
