@extends('layouts.website')
@section('content')
    <div class="header-bg vh-70 d-flex">
        <div class="m-auto">
            <div class="ps-2">
                <h1>UTAS Lunch Order System</h1>
                <p>University of Tasmania Lunch Order System</p>
                <a href="#" class="btn-style rounded-pill text-decoration-none"><i class="fa fa-shopping-cart me-2"></i>Order now</a>
            </div>
        </div>
    </div>
    <!-- Shop Section Start here -->
    <section>
        <div class="text-center mt-5">
            <div class="shop-title">Food Shops</div>
            <div class="fs-1">Shop Links</div>
        </div>
        <div class="container mt-4">
            <div class="row justify-content-center">
                @foreach($shops as $shop)
                <div class="col-md-3 col-lg-3 col-6">
                        <div class="shop-cards">
                            <a href="{{route('shopProducts',[$shop->id])}}" class="text-decoration-none text-dark">
                                <h3>{{$shop->name}}</h3>
                            </a>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Shop Section End here -->

@endsection
