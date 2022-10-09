@extends('layouts.website')
@section('content')
    <div class="header-bg vh-50 d-flex">
        <div class="container m-auto">
           <div class="text-center fs-1">Product Detail Page</div>
        </div>
    </div>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <div>
                    <img src="{{ $product->image }}" width="100%" height="auto" class="rounded" alt="product img">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                   <div>
                       <span class="fs-3 clr">Product Name</span><br>
                       <span class="fs-5">{{$product->title}}</span>
                   </div>
                   <div class="mt-2">
                       <span class="fs-3 clr">Price</span><br>
                       <span class="fs-5"> $ {{$product->price}}</span>
                   </div>
                    <div class="mt-2">
                        <span class="fs-3 clr">Quantity</span><br>
                        <div>1</div>
                    </div>
                   <div class="mt-2">
                       <span class="fs-3 clr">Description</span><br>
                       <span class="fs-5"> {{$product->description}}</span>
                   </div>
                    <div class="mt-2">
                        <a href="{{route('getMenu')}}" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-arrow-left me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
