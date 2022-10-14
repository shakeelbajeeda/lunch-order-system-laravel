@extends('layouts.website')
@section('content')
    <div class="container">
        <div class="py-3 text-primary text-center h1">
        My Shop Order History
        </div>
        @if(session('error'))
            <div class="alert alert-danger fs-3 alert-dismissible fade show mt-3" role="alert">
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
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0 fs-2"> My Shop Orders History</h5>
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
                        <th class="fw-bold fs-3">Customer</th>
                        <th class="fw-bold fs-3">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="align-middle fs-3">{{ $order->ref_id }}</td>
                            <td><img src="{{$order->product->image}}" alt="product" style="height: 70px; width: 70px;"></td>
                            <td class="align-middle fs-3">{{ $order->product->title }}</td>
                            <td class="align-middle fs-3">{{ $order->quantity }}</td>
                            <td class="align-middle fs-3">$ {{ $order->price }}</td>
                            <td class="align-middle fs-3">{{ $order->comment }}</td>
                            <td class="align-middle fs-3">{{$order->user->name}}   </td>
                            <td class="align-middle fs-3">{{date('Y, M d: h i A', strtotime($order->created_at))}}   </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
@endsection
