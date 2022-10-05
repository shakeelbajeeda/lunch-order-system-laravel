@extends('layouts.user')
@section('content')
    <div class="col-md-9">
        <div class="col-12">
            <div class="text-center fs-2">Order Detail</div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Shop</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td><img src="{{asset('storage'). '/'. $product->product->image}}" width="80px" height="80px" alt=""></td>
                            <td class="align-middle">{{$product->product->title}}</td>
                            <td class="align-middle">{{$product->quantity}}</td>
                            <td class="align-middle">$ {{$product->price}}</td>
                            <td class="align-middle">{{$product->shop->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
