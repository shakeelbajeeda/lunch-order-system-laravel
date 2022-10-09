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
        <div class="row">
            <div class="col-md-4">
            <div class="fs-2 text-center py-5">Opening Time: {{date('h:i A', strtotime($shop->opening_time))}}</div>
            </div>
            <div class="col-md-4">
            <div class="fs-2 text-center py-5">{{$shop->name}}</div>
            </div>
            <div class="col-md-4">
            <div class="fs-2 text-center py-5">Closing Time: {{date('h:i A', strtotime($shop->closing_time))}}</div>
            </div>
            <div class="col-md-12 py-3">
                @if(auth()->user())
               <div class="text-center fs-2 font-weight-bolder">Your Current Balance is: <span class="text-warning">$ {{auth()->user()->balance}}</span></div>
                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <section>
                <div class="container">
                    <h2 class="h1 text-center fw-bold mb-4 mt-5">Shop Menu</h2>
                    <div class="row justify-content-center py-5">
                        @foreach($shop->products as $product)
                        <div class="col-md-4">
                            <div class="card bg-secondary text-light mt-5" style="width: 18rem;">
                                <img src="{{$product->image}}" height="200px" width="200px" class="card-img-top" alt="...">
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
                                                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                                                    Quantity: <input type="number" id="quantity" name="quantity" value="1" style="width: 50px" min="1">
                                                </div>
                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-warning rounded-pill w-100">Order Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                 </div>
            </section>
        </div>
    </section>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        @if (session()->has('message'))
        toastMixin.fire({
            animation: true,
            title: '{{ session()->get('message') }}'
        });
        @endif
        @if (session()->has('error'))
        toastMixin.fire({
            animation: true,
            icon: 'error',
            title: '{{ session()->get('error') }}'
        });
        @endif
    </script>
@endsection
