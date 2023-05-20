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
            Users Management
        </div>
        <div class="pt-3 pb-5">
            <a href="{{ route('users.create') }}" class="btn btn-dark">+ Add New</a>
        </div>
        <div class="table-responsive">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
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
                @foreach($users as $user)
                    <tr>
                        <td class="align-middle text-capitalize">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ $user->address }}</td>
                        <td class="align-middle">{{ $user->zone }}</td>
                        <td class="align-middle">${{ $user->balance }}</td>
                        <td class="align-middle">{{ $user->user_type }}</td>
                        <td class="align-middle">
                            <span class="badge badge-pill {{ $user->is_active ? 'badge-success' : 'badge-danger' }}">
                            {{ $user->is_active == 1 ? 'Activated' : 'Inactivated' }}
                            </span>
                        </td>
                        <td class="align-middle d-flex">
                            <a class="ml-3 btn btn-info"
                               href="{{ route('users.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" >
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
