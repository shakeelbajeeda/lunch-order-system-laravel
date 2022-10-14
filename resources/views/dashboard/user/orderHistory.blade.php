@extends('layouts.website')
@section('content')
    <div class="container">
        <div class="py-3 text-center text-primary h1">
           My Order History
        </div>
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fs-3 mb-0">  My Order History</h5>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th class="fw-bold fs-3">Order ID</th>
                        <th class="fw-bold fs-3">Product</th>
                        <th class="fw-bold fs-3">Title</th>
                        <th class="fw-bold fs-3">Quantity</th>
                        <th class="fw-bold fs-3">Price</th>
                        <th class="fw-bold fs-3">Comment</th>
                        <th class="fw-bold fs-3">Shop</th>
                        <th class="fw-bold fs-3">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="align-middle fs-3">{{ $order->ref_id }}</td>
                            <td><img src="{{$order->product->image}}" alt="product" style="width: 70px;height: 70px"></td>
                            <td class="align-middle fs-3">{{ $order->product->title }}</td>
                            <td class="align-middle fs-3">{{ $order->quantity }}</td>
                            <td class="align-middle fs-3">$ {{ $order->price }}</td>
                            <td class="align-middle fs-3">{{ $order->comment }}</td>
                            <td class="align-middle fs-3">{{$order->shop->name}} </td>
                            <td class="align-middle fs-3">{{date('Y, M d: h i A', strtotime($order->created_at))}}   </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
@endsection
