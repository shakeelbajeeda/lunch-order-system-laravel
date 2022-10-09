<div class="hero_area">
    <div class="bg-box">
        <img src="{{asset('website/images/hero-bg.jpg')}}" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{url('/')}}">
            <span>
              UTAS Lunch
            </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mx-auto ">
                        <li class="nav-item active">
                            <a class="nav-link"  href="{{url('/')}}">Home</a>
                        </li>
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
                    <div class="user_option">
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
                                    <a class="nav-link text-white btn btn-warning rounded-pill                                                                                                                              " href="{{route('login')}}">Login</a>
                                </li>
                                <li class="nav-item ms-3">
                                    <a class="nav-link text-white btn btn-warning rounded-pill" href="{{route('register')}}">Register</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Fast Food Restaurant
                                    </h1>
                                    <p class="fs-5">
                                        Think about what makes each dish unique. Write down adjectives focusing on smell, taste, texture, or the cooking method. Meat can be smoky, spicy, well-done, tender, juicy, lean, or aged. Vegetables can range between fresh, earthy, and zesty
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Fast Food Restaurant
                                    </h1>
                                    <p class="fs-5">
                                        Think about what makes each dish unique. Write down adjectives focusing on smell, taste, texture, or the cooking method. Meat can be smoky, spicy, well-done, tender, juicy, lean, or aged. Vegetables can range between fresh, earthy, and zesty
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Fast Food Restaurant
                                    </h1>
                                    <p class="fs-5">
                                        Think about what makes each dish unique. Write down adjectives focusing on smell, taste, texture, or the cooking method. Meat can be smoky, spicy, well-done, tender, juicy, lean, or aged. Vegetables can range between fresh, earthy, and zesty
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </div>

    </section>
    <!-- end slider section -->
</div>
