@extends('layouts.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Form</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Create New User
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="h1  text-info text-center pt-4">{{@$user? 'Edit User' : 'Add User'}}</div>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="post" action="{{@$user? route('user.update',[@$user->id]): route('user.store') }}" class="my-5" enctype="multipart/form-data">
            @csrf
            @if(@$user)
                @method('put')
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mt-4">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{@$user? @$user->name : old('name') }}" placeholder="UserName">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{@$user ? @$user->email : old('email') }}" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                               value="{{@$user? @$user->phone : old('phone') }}" placeholder="Phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                               value="{{@$user? @$user->address : old('address') }}" placeholder="Address">
                        @error('address')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <select name="role" class="form-select @error('role') is-invalid @enderror"
                                aria-label="Default select example">
                            <option value="{{@$user? @$user->role : ''}}" selected>{{@$user? @$user->role : 'Select Role'}}</option>
                            <option value="director">Director</option>
                            <option value="manager">Manager</option>
                            <option value="shop_staff">Shop Staff</option>
                            <option value="user">User</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 text-center mt-4">
                        <a href="{{route('user.index')}}" class="btn btn-danger px-3">Cancel</a>
                        <button type="submit" name="add" class="px-3 btn btn-info float-right"> <i
                                class="fa fa-plus"></i>
                            {{@$user? 'Update' : 'Add'}}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
