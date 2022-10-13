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
      <div class="text-center py-5 fs-2">Product Detail Page</div>
    </section>
    <section>
        <div class="container">
            <section>
                <div class="container">
                    <h2 class="h1 text-center fw-bold mb-4 mt-5">Detail</h2>
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
                            <div class="col-md-6">
                                <img src="{{$product->image}}" height="auto" width="100%" class="card-img-top" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-secondary text-light pb-5">
                                    <div class="card-body">
                                        <h5 class="card-title title">{{$product->title}}</h5>
                                        <p class="card-text description">{{$product->description}}</p>
                                        <form action="{{route('order_now')}}" method="post">
                                            @csrf
                                            <div class="row py-3">
                                                <div class="col-5">
                                                    <div class="text-right">Price: $ {{$product->price}}</div>
                                                </div>
                                                <div class="col-7">
                                                    <div>
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        <input type="hidden" name="shop_id" value="{{$shop_id}}">
                                                        Quantity: <input type="number" id="quantity" name="quantity" value="1" style="width: 50px" min="1">
                                                    </div>
                                                </div>
                                                <div class="col-12 pt-5">
                                                    <textarea name="comment" class="form-control" placeholder="Enter Comment OR any extra dish"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info w-100">Order Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
        </div>
@endsection
