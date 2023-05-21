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
            Renewable Energies
        </div>
        <div class="pt-3 pb-5">
            <a href="{{ route('renewable-energies.create') }}" class="btn btn-outline-success">+ Add New</a>
        </div>
        <div class="table-responsive bg-success rounded">
            <table id="dtHorizontalExample" class="table text-white table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Energy Type</th>
                    <th>Volume</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($renewable_energies as $key => $item)
                    <tr>
                        <td class="align-middle">{{ $key + 1 }}</td>
                        <td class="align-middle text-capitalize">{{ $item->renewableEnergyType->energy_type }}</td>
                        <td class="align-middle">{{ round($item->volume) }} KWH</td>
                        <td class="align-middle">${{ $item->price }}</td>
                        <td class="align-middle d-flex">
                            <a class="ml-3 btn btn-outline-primary"
                               href="{{ route('renewable-energies.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <form id="delete-form" action="{{ route('renewable-energies.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger ml-3"><i class="fa fa-trash"></i></button>
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
