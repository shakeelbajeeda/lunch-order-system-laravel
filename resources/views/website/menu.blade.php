@extends('layouts.website')
@section('content')
        <div class="container">
                <div class="container">
                    <h2 class="h1 text-center fw-bold mb-4 mt-5">Menu</h2>
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fs-3 fade show mt-3" role="alert">
                            <strong>Error!</strong> {{session('error')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('message'))
                        <div class="alert alert-success fs-3 alert-dismissible fade show mt-3" role="alert">
                            <strong>Success!</strong> {{session('message')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                 </div>
        </div>
    <section id="dishGrid" data-aos="fade-down">
        <div class="container">
            <h2 class="dishGrid__title">
                {{$shop->name}} Top Dashes
            </h2>
            <div class="dishGrid__wrapper">
                @foreach($shop->products as $product)
                <div class="dishGrid__item">
                    <div class="dishGrid__item__img">
                        <img src="{{$product->image}}" alt="food img">
                    </div>
                    <div class="dishGrid__item__info">
                        <h3 class="dishGrid__item__title">
                           {{$product->title}}
                        </h3>
                        <form action="{{route('order_now')}}" method="post">
                            @csrf
                                <div class="col-5">
                                    <div class="text-right fs-4">Price: $ 130</div>
                                </div>
                                <div class="col-7">
                                    <div class="fs-3">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                        Quantity: <input type="number" id="quantity" name="quantity" value="1" style="width: 50px" min="1">
                                    </div>
                                </div>
                                <div class="col-12 pt-5">
                                    <textarea name="comment" class="form-control fs-3" placeholder="Enter Comment OR any extra dish"></textarea>
                                </div>
                            <button type="submit" class="btn btn-primary mt-4 fs-3">Order Now</button>
                        </form>
                        <br>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
