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
            Master Trading Page
        </div>
        <div class="pt-3 pb-5">
            <a href="{{ route('renewable-energy-type.create') }}" class="btn btn-dark">+ Add New</a>
        </div>
        <div class="table-responsive">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Energy Type</th>
                    <th>Market Price</th>
                    <th>Administration Fee</th>
                    <th>Tax</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($renewable_energy_types as $item)
                    <tr>
                        <td class="align-middle text-capitalize">{{ $item->energy_type }}</td>
                        <td class="align-middle">${{ $item->market_price }}</td>
                        <td class="align-middle">${{ $item->administration_fee }}</td>
                        <td class="align-middle">${{ $item->tax }}</td>
                        <td class="align-middle d-flex">
                            <a class="ml-3 btn btn-info"
                               href="{{ route('renewable-energy-type.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <form id="delete-form" action="{{ route('renewable-energy-type.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger ml-3"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
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
