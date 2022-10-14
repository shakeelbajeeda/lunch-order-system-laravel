@extends('layouts.website')
@section('content')
    <div class="container">

     <div class="my-3">
         <a href="{{route('user.create')}}" class="btn btn-primary fs-3">Add New User</a>
     </div>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade fs-3 show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade fs-3 show mt-3" role="alert">
                <strong>Success!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fs-3 mb-0">Users</h5>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="fs-3 fw-bold">Name</th>
                        <th class="fs-3 fw-bold">Email</th>
                        <th class="fs-3 fw-bold" >Phone</th>
                        <th class="fs-3 fw-bold">Address</th>
                        <th class="fs-3 fw-bold">Role</th>
                        <th class="fs-3 fw-bold">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="align-middle fs-3">{{ $user->name }}</td>
                            <td class="align-middle fs-3">{{ $user->email }}</td>
                            <td class="align-middle fs-3">{{ $user->phone }}</td>
                            <td class="align-middle fs-3">{{ $user->address }}</td>
                            <td class="align-middle fs-3">{{ $user->role == 'shop_staff'? 'Shop Staff' : $user->role }}</td>
                            <td class="d-flex">
                                <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger fs-3" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                <a class="btn btn-info ms-2 fs-3"
                                   href="{{ route('user.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
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
