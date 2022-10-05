@extends('layouts.director')
@section('content')
    <div class="col-md-9">
        <div class="col-12">
          <div class="text-center fs-2">Order History</div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                      <tr>
                          <th>Product</th>
                          <th>Title</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Customer</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td><img src="{{asset('storage'). '/'. $order->product->image}}" width="80px" height="80px" alt=""></td>
                        <td class="align-middle">{{$order->product->title}}</td>
                        <td class="align-middle">{{$order->quantity}}</td>
                        <td class="align-middle">$ {{$order->price}}</td>
                        <td class="align-middle">{{ $order->order->user->name }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
