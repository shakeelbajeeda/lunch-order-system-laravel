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
        <div class="py-3 text-center text-success h2">
            Users Management
        </div>
        <div class="pt-3 pb-5 text-center">
            <a href="{{ route('users.create') }}" class="btn btn-outline-success">+ Add New User</a>
        </div>
        <div class="table-responsive rounded">
            <table id="dtHorizontalExample" class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
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
                        <td class="align-middle text-capitalize">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ $user->address }}</td>
                        <td class="align-middle">{{ $user->zone }}</td>
                        <td class="align-middle">${{ $user->balance }}</td>
                        <td class="align-middle">{{ $user->user_type }}</td>
                        <td class="align-middle">
                            {{ $user->is_active == 1 ? 'Activated' : 'Inactivated' }}
                        </td>
                        <td class="align-middle d-flex">
                            <a class="ml-3 btn btn-outline-primary"
                               href="{{ route('users.edit', $user->id) }}">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" >
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
