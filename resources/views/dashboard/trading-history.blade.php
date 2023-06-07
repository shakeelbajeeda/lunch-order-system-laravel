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
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error!</strong> {{ session('error') }}.
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> {{ session('message') }}.
            </div>
        @endif
        <div class="py-3 text-center h2">
            Trading History <br>
            @if(count($orders) > 0)
            <a href="{{ route('export-history') }}" class="btn btn-outline-success mt-3"><i class="fa fa-file-export mr-2"></i>Export Trading History</a>
            @endif
        </div>
        <div class="table-responsive">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-secondary table-hover table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Buyer</th>
                    <th>Seller</th>
                    <th>Energy Type</th>
                    <th>Zone</th>
                    <th>Volume</th>
                    <th>Amount</th>
                    <th>Order Date</th>
                </tr>
                </thead>
                <tbody>
                @if(count($orders) > 0)
                @foreach($orders as $key => $order)
                    <tr>
                        <td class="align-middle text-capitalize">{{ $key + 1 }}</td>
                        <td class="align-middle text-capitalize">{{ $order->buyer->name }}</td>
                        <td class="align-middle">{{ $order->seller->name }}</td>
                        <td class="align-middle text-capitalize">{{ $order->renewableEnergy->renewableEnergyType->energy_type }}</td>
                        <td class="align-middle">{{ $order->seller->zone }}</td>
                        <td class="align-middle">{{ $order->volume }} KWH</td>
                        <td class="align-middle">${{ $order->price }}</td>
                        <td class="align-middle">{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center py-3 fs-5">No History Found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div><br>
@endsection
