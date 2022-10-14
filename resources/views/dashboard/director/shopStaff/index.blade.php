@extends('layouts.website')
@section('content')
    <div class="container">
        <div class="my-3">
            <a href="{{route('shopstaff.create')}}" class="btn btn-primary fs-3">Add New ShopStaff</a>
        </div>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fs-3 fade show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success fs-3 alert-dismissible fade show mt-3" role="alert">
                <strong>Success!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0  fs-2">Shop Staffs & Managers</h5>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th class="fw-bold fs-3">Shop Name</th>
                        <th class="fw-bold fs-3">User Name</th>
                        <th class="fw-bold fs-3">Role</th>
                        <th class="fw-bold fs-3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shop_staffs as $shopStaff)
                        <tr>
                            <td class="fs-3">{{ $shopStaff->shop->name }}</td>
                            <td class="fs-3">{{ $shopStaff->user->name }}</td>
                            <td class="fs-3">{{ $shopStaff->user->role }}</td>
                            <td class="d-flex">
                                <form method="POST" action="{{ route('shopstaff.destroy', $shopStaff->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger fs-3" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                <a class="ms-2 btn btn-info fs-3"
                                   href="{{ route('shopstaff.edit', $shopStaff->id) }}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
@endsection
