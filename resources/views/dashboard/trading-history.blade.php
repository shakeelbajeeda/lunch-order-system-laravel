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
        <div class="py-3 text-center h2 text-success">
            Trade History <br>
            @if(count($orders) > 0)
            <a href="{{ route('export-history') }}" class="btn btn-outline-success mt-3"><i class="fa fa-file-export mr-2"></i>Export In Excel File</a>
            @endif
        </div>
        <div class="table-responsive bg-success">
            <table id="dtHorizontalExample" class="table text-white table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Buyer Name</th>
                    <th>Seller Name</th>
                    <th>Energy Type</th>
                    <th>Zone</th>
                    <th>Volume</th>
                    <th>Price</th>
                    <th>Trade Date</th>
                </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div><br>
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
