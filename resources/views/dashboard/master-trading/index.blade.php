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
        Master Trading
    </div>
    <div class="pt-3 pb-5">
        <a href="{{ route('all-energy-types.create') }}" class="btn btn-outline-success">+ New</a>
    </div>
    <div class="table-responsive rounded">
        <table id="dtHorizontalExample" class="table table-bordered table-striped table-sm" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Energy</th>
                <th>Market Price</th>
                <th>Administration Fee</th>
                <th>Tax on Energy</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($all_energy_types) && count($all_energy_types) > 0)
            @foreach($all_energy_types as $key => $item)
                <tr>
                    <td class="align-middle text-capitalize">{{ $key + 1 }}</td>
                    <td class="align-middle text-capitalize">{{ $item->type }}</td>
                    <td class="align-middle">${{ $item->price }}</td>
                    <td class="align-middle">${{ $item->administration_fee }}</td>
                    <td class="align-middle">${{ $item->energy_tax }}</td>
                    <td class="align-middle d-flex">
                        <a class="ml-3 btn btn-outline-info"
                           href="{{ route('all-energy-types.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                        <form id="delete-form" action="{{ route('all-energy-types.destroy', $item->id) }}"
                              method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger ml-3"><i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center py-3">
                        Master Trading Not Found
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
