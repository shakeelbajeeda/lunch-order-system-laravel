@extends('layouts.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tables</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">
                                My Order History
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="py-3 text-center text-info h2">
           My Order History
        </div>
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">  My Order History Table</h5>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Price</th>
                        <th>Comment</th>
                        <th>Shop</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="align-middle">{{ $order->ref_id }}</td>
                            <td><img src="{{$order->product->image}}" alt="product" height="100px" width="100px"></td>
                            <td class="align-middle">{{ $order->product->title }}</td>
                            <td class="align-middle">{{ $order->quantity }}</td>
                            <td class="align-middle">$ {{ $order->discount }}</td>
                            <td class="align-middle">$ {{ $order->price }}</td>
                            <td class="align-middle">{{ $order->comment }}</td>
                            <td class="align-middle">{{$order->shop->name}} </td>
                            <td class="align-middle">{{date('Y, M d: h i A', strtotime($order->created_at))}}   </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
@endsection
