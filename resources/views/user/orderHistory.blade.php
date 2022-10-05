@extends('layouts.user')
@section('content')
    <div class="col-md-9">
        <div class="col-12">
          <div class="text-center fs-2">Order History</div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                      <tr>
                          <th>Order ID</th>
                          <th>Total Amount</th>
                          <th>date</th>
                          <th>View Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>$ {{$order->total_amount}}</td>
                        <td>{{ date('Y M, d h:i A', strtotime($order->created_at)) }}</td>
                        <td><a href="{{route('order_detail', [$order->id])}}" class="btn btn-primary"><i class="fa fa-eye me-2"></i>detail</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
