@extends('layouts.director')
@section('content')
            <div class="col-md-9">
                <div class="text-center mb-3"><a href="{{route('users.create')}}" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-plus me-2"></i>Add User & Staff & Manager</a></div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="align-middle">{{$user->name}}</td>
                            <td class="align-middle">{{$user->email}}</td>
                            <td class="align-middle">{{$user->role}}</td>
                            <td class="align-middle">
                                    <a href="{{route('users.edit', [$user->id])}}"><i class="fa fa-edit fs-4"></i></a>
                                        <a href="{{route('users_destroy', [$user->id])}}"><i class="fa fa-trash text-danger fs-4"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
