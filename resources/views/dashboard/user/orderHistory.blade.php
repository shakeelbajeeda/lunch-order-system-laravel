@extends('layouts.dashboard')
@section('content')
    <style>
        .table-responsive1 {
            width: 100%;
            margin-bottom: 15px;
            overflow-x: auto;
            /* overflow-y: hidden; */
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #DDD;
        }

        .w_120 {
            width: 120px;
        }
    </style>
    <div class="container">
        <div class="py-3 text-center h2">
           Order History
        </div>
        <div class="table-responsive">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
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
                        <td class="align-middle">$ {{ $order->price }}</td>
                        <td class="align-middle">{{$order->shop->name}} </td>
                        <td class="align-middle">{{date('Y, M d: h i A', strtotime($order->created_at))}}   </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><br>
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
