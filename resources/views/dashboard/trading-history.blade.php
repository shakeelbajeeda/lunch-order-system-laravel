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
            Trading History <br>
            @if(count($orders) > 0)
            <a href="{{ route('export-history') }}" class="btn btn-primary mt-3"><i class="fa fa-file-export mr-2"></i>Export Excel</a>
            @endif
        </div>
        <div class="table-responsive">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
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
                @foreach($orders as $order)
                    <tr>
                        <td class="align-middle text-capitalize">{{ $order->user->name }}</td>
                        <td class="align-middle">{{ $order->renewableEnergy->user->name }}</td>
                        <td class="align-middle text-capitalize">{{ $order->renewableEnergy->renewableEnergyType->energy_type }}</td>
                        <td class="align-middle">{{ $order->user->zone }}</td>
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
