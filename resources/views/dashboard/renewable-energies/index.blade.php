@extends('layouts.app')
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
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="py-3 text-center h2 text-success">
            Sell Renewable Energies
        </div>
        <div class="pt-3 pb-5 text-center">
            <a href="{{ route('renewable-energies.create') }}" class="btn btn-outline-success">+ Sell Energy</a>
        </div>
        <div class="table-responsive rounded">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
                            <a class="ml-3 btn btn-outline-info"
                               href="{{ route('renewable-energies.edit', $item->id) }}">Edit</a>
                            <form id="delete-form" action="{{ route('renewable-energies.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger ml-3">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><br>
@endsection
