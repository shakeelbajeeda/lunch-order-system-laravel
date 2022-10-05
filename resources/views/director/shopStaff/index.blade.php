@extends('layouts.director')
@section('content')
    <div class="col-md-9">
        <div>
            <a href="{{route('shopStaff.create')}}" class="btn btn-primary">Add New Staff</a>
        </div>
        <div class="table-responsive mt-2">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Shop Name</th>
                    <th>Worker Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shopStaffs as $shopStaff)
                    <tr>
                        <td class="align-middle">{{$shopStaff->shop->name}}</td>
                        <td class="align-middle">{{$shopStaff->user->name}}</td>
                        <td class="align-middle">{{$shopStaff->user->role}}</td>
                        <td class="align-middle">
                            <a href="{{route('shopStaff.edit', [$shopStaff->id])}}"><i class="fa fa-edit fs-4"></i></a>
                            <a href="{{route('shopStaff_destroy', [$shopStaff->id])}}"><i class="fa fa-trash text-danger fs-4"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
