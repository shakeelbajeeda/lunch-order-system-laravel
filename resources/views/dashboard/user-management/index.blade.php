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
    <div class="py-3 text-center text-success h2">
        All Users List
    </div>
    <div class="pt-3 pb-5">
        <a href="{{ route('users.create') }}" class="btn btn-outline-success">+ Add New</a>
    </div>
    <div class="table-responsive w-100">
        <table id="dtHorizontalExample" class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Zone</th>
                <th>Balance</th>
                <th>User Type</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $user)
                <tr>
                    <td class="align-middle">{{ $key + 1 }}</td>
                    <td class="align-middle text-capitalize">{{ $user->user_name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->address }}</td>
                    <td class="align-middle">{{ $user->zone }}</td>
                    <td class="align-middle">${{ $user->account_balance }}</td>
                    <td class="align-middle">{{ $user->role }}</td>
                    <td class="align-middle">
                        <span class="badge {{ $user->status ? 'badge-primary' : 'badge-danger' }}">
                        {{ $user->status == 1 ? 'Activated' : 'Inactivated' }}
                        </span>
                    </td>
                    <td class="align-middle d-flex">
                        <a class="ml-3 btn btn-outline-primary"
                           href="{{ route('users.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post" >
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
