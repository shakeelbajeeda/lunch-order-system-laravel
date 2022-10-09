@extends('layouts.website')
@section('content')
    <div class="header-bg vh-50 d-flex">
        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h4>Shop Opening Time: <span class="text-danger">{{date('h:i A', strtotime($shop->opening_time))}}</span></h4>
                </div>
                <div class="col-6">
                    <h4 class="float-end">Shop Closing Time: <span class="text-danger">{{date('h:i A', strtotime($shop->closing_time))}}</span></h4>
                </div>
                <div class="col-12">
                    <h1 class="text-center">{{$shop->name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Start Here -->
    <section>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center fs-2">FOOD & BEVERAGE AVAILABLE AT THE SHOP</div>
                </div>
                @foreach($shop->products as $product)
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="{{$product->image}}" width="100%" height="200px" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4 title" >{{$product->title}}</div>
                            <div class="fs-6 description">{{$product->description}}</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <span class="text-secondary">Quantity: 1</span>
                                </div>
                                <div class="col-6">
                                    Price : $ {{$product->price}}
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="{{route('productDetail',[$product->id])}}" class="btn btn-primary rounded-pill mb-2"><i class="fa fa-eye me-2"></i>View Detail</a>
                                    <a href="{{route('addToCart', [$product->id, $shop->id])}}" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Section End Here -->
@endsection
