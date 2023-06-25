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
    <div class="py-3 text-center h2 text-success">
        Trade History <br>
        @if(count($orders) > 0)
        <a href="{{ route('export.energy.trade.history') }}" class="btn btn-outline-success mt-3"><i class="fa fa-file-export mr-2"></i>Export In Excel File</a>
        @endif
    </div>
    <div class="table-responsive">
        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Energy Seller Name</th>
                <th>Energy Buyer Name</th>
                <th>Energy Type</th>
                <th>Energy Zone</th>
                <th>Energy Volume</th>
                <th>Energy Price</th>
                <th>Date of Trade</th>
            </tr>
            </thead>
            <tbody>
            @if(count($orders) > 0)
            @foreach($orders as $key => $order)
                <tr>
                    <td class="align-middle text-capitalize">{{ $key + 1 }}</td>
                    <td class="align-middle">{{ $order->energy_seller->user_name }}</td>
                    <td class="align-middle text-capitalize">{{ $order->energy_buyer->user_name }}</td>
                    <td class="align-middle text-capitalize">{{ $order->energy->all_energy_type->type }}</td>
                    <td class="align-middle">{{ $order->energy_buyer->zone }}</td>
                    <td class="align-middle">{{ $order->purchased_volume }} KWH</td>
                    <td class="align-middle">${{ $order->total_price }}</td>
                    <td class="align-middle">{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center">
                        No History Found
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script>
        @if (session()->has('message'))
        Swal.fire(
            'Good job!',
            '{{ session()->get('message') }}',
            'success'
        )
        @endif
        @if (session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `{{ session()->get('error') }}`,
        })
        @endif
    </script>
@endsection
