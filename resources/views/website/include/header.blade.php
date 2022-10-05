<!-- Header Start here -->
<style>
    @media only screen and (max-width: 768px) {
        .navbar {
            background: white;
        }

        .auth {
            margin-bottom: 8px;
        }
    }
    .main-section{
        background-color: #F8F8F8;
        margin-top:50px;
    }
    .dropdown .dropdown-menu{
        padding:20px;
        top:30px !important;
        width:350px !important;
        left:-110px !important;
        box-shadow:0px 5px 30px black;
    }
    .total-header-section{
        border-bottom:1px solid #d2d2d2;
    }
    .total-section p{
        margin-bottom:20px;
    }
    .cart-detail{
        padding:15px 0px;
    }
    .cart-detail-img img{
        width:100%;
        height:100%;
        padding-left:15px;
    }
    .cart-detail-product p{
        margin:0px;
        color:#000;
        font-weight:500;
    }
    .cart-detail .price{
        font-size:12px;
        margin-right:10px;
        font-weight:500;
    }
    .cart-detail .count{
        color:#C2C2DC;
    }
    .checkout{
        border-top:1px solid #d2d2d2;
        padding-top: 15px;
    }
    .checkout .btn-primary{
        border-radius:50px;
        height:50px;
    }
    .dropdown-menu:before{
        content: " ";
        position:absolute;
        top:-20px;
        right:50px;
        border:10px solid transparent;
        border-bottom-color:#fff;
    }
</style>
<div class="position-absolute fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid mx-md-5">
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/images/logo.png')}}" style="height: 40px;"
                                                           class="d-inline-block align-top" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item"><a class="nav-link text-dark active" href="{{url('/')}}">Home</a></li>
                    @if(!auth()->user())
                        <li class="nav-item"><a class="nav-link text-dark" href="{{url('/')}}">Menu</a></li>
                    @endif
                    @if(auth()->check())
                        @if(auth()->user()->role == 'shop staff' || auth()->user()->role == 'manager')
                        <li class="nav-item"><a class="nav-link text-dark" href="{{route('getMenu')}}">Menu</a></li>
                        @endif
                    @if(auth()->user()->role == 'director')
                            <li class="nav-item"><a class="nav-link text-dark" href="{{route('products.index')}}">Master
                                    Food & Beverage </a></li>
                        @endif
                        @if(auth()->user()->role == 'manager' || auth()->user()->role == 'shop staff')
                            <li class="nav-item"><a class="nav-link text-dark" href="{{route('getProducts')}}">Master
                                    Food & Beverage </a></li>
                        @endif
                        @if(auth()->user()->role == 'director')
                            <li class="nav-item"><a href="{{route('users.index')}}"
                                                    class="nav-link text-dark">Dashboard</a></li>
                        @elseif(auth()->user()->role == 'user')
                                <li class="nav-item"><a class="nav-link text-dark" href="{{url('/home-menu')}}">Menu</a></li>
                                <li class="nav-item"><a href="{{url('/account')}}" class="nav-link text-dark">Dashboard</a></li>
                        @elseif(auth()->user()->role == 'manager' || auth()->user()->role == 'shop staff')
                            <li class="nav-item"><a href="{{route('menumanagement')}}" class="nav-link text-dark">Dashboard</a>
                            </li>
                        @endif
                        <div class="float-end">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <li class="nav-item ms-5">
                                    <button type="submit" class="btn-style text-decoration-none rounded-pill me-3"><i
                                            class="fa fa-lock me-2"></i> Logout
                                    </button>
                                </li>
                            </form>
                        </div>
                    @else
                        <li class="nav-item"><a href="{{route('login')}}"
                                                class="btn-style auth text-decoration-none rounded-pill"><i
                                    class="fa fa-lock me-2"></i> Login</a></li>
                        <li class="nav-item"><a href="{{route('register')}}"
                                                class="btn-style auth text-decoration-none rounded-pill ms-3"><i
                                    class="fa fa-user me-2"></i> Register</a></li>
                    @endif
                    <li class="d-md-block d-none ms-5">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary rounded-pill" data-toggle="dropdown" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill text-badge-danger">{{ count((array) session('cart')) }}</span>
                            </button>
                            <div class="dropdown-menu mt-4" aria-labelledby="dropdownMenuButton1">
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger text-secondary">{{ count((array) session('cart')) }}</span>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p>Total: <span class="text-info">$
                                                @php $total = 0 @endphp
                                                @foreach((array) session('cart') as $id => $product)
                                                    @php $total += $product['price'] * $product['quantity'] @endphp
                                                @endforeach
                                              {{$total}}
                                                 </span>
                                        </p>
                                    </div>
                                </div>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $product)
                                        <div class="row cart-detail">
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                <img src="{{asset('storage') .'/'.$product['image']}}">
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                 <p>{{$product['title']}}</p>
                                                <span class="price text-info"> ${{$product['price']*$product['quantity']}}</span> <span class="count"> Quantity:{{$product['quantity']}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-6 text-center checkout">
                                        <a href="{{url('/cart')}}" class="btn btn-primary">Manage Cart</a>
                                    </div>
                                    <div class="col-6 text-center checkout">
                                        <a href="{{url('/checkout')}}" class="btn btn-primary btn-block">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Header End Here -->
