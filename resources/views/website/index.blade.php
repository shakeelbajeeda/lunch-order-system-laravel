@extends('layouts.website')
@section('content')
    <section>
        <img src="{{asset('website.jpg')}}" height="550px" width="100%" alt="">
    </section>
<section>
    <div class="container pb-5">
        <h2 class="my-5 text-primary text-center">
            All Shops Links
        </h2>
        <div class="row justify-content-center pb-5">
            @foreach($shops as $shop)
            <div class="col-md-4 mt-2">
                <div class="card text-center">
                    <div class="card-header">
                        Restaurant
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$shop->name}}</h5>
                        <a href="{{route('get_shop_products', [$shop->id])}}" class="btn btn-primary">Show Products</a>
                    </div>
                    <div class="card-footer text-muted">
                        Tasmania Lunch System
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
