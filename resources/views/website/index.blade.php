@extends('layouts.website')
@section('content')
<section class="text-center there-box-background-color">
    <div class="container pb-5">
        <h2 class="my-5">Shop
            <span class="text-danger h2">Links</span>
        </h2>
        <div class="mt-5 row justify-content-center" id="shop_section">
            @foreach($shops as $shop)
                <div class="col-md-4">
                    <div class="card py-4 bg-dark mt-5">
                        <div class="text-center">
                            <h3 class="text-light font-weight-bolder">
                                {{$shop->name}}
                            </h3>
                            <br>
                            <a class="btn btn-warning rounded-pill px-5" href="{{route('get_shop_products', [$shop->id])}}">
                                Visit Shop
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
