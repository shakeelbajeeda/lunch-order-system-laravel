@extends('layouts.website')
@section('content')
    <style>
        .description {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .title {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
    <section class="bg-secondary text-light">
                    <marquee class="row py-5 text-info">
                        <div class="fs-2">Shop Opening Time: {{date('h:i A', strtotime($shop->opening_time))}}</div>
                        <div class="fs-2 text-center">Shop => {{$shop->name}}</div>
                        <div class="fs-2">Shop Closing Time: {{date('h:i A', strtotime($shop->closing_time))}}</div>
                    </marquee>
    </section>
    <section>
        <div class="container">
            <section>
                <div class="container">
                    <h2 class="h1 text-center fw-bold mb-4 mt-5">Menu</h2>
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <strong>Error!</strong> {{session('error')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <strong>Success!</strong> {{session('message')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row justify-content-center py-5">
                        @foreach($shop->products as $product)
                        <div class="col-md-4">
                            <div class="card bg-secondary text-light mt-5" style="width: 18rem;">
                                <img src="{{$product->image}}" height="200px" width="200px" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title title">{{$product->title}}</h5>
                                    <p class="card-text description">{{$product->description}}</p>
                                        <div class="row py-3">
                                            <div class="col-5">
                                                <div class="text-right">Price: $ {{$product->price}}</div>
                                            </div>
                                            <div class="col-7">
                                                <div>
                                                    Quantity: <input type="number" id="quantity" name="quantity" value="1" style="width: 50px" min="1">
                                                </div>
                                            </div>
                                        </div>
                                    <a  href="{{route('product_detail', [$product->id, $shop->id])}}" type="submit" class="btn btn-warning rounded-pill w-100">View Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                 </div>
            </section>
        </div>
    </section>
@endsection
