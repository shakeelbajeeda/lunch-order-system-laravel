@extends('layouts.website')
@section('content')
    <div class="container">
        <div class="h1  text-primary text-center pt-4">{{@$user? 'Edit User' : 'Add New User & Staff & Manager'}}</div>
        @if(session('error'))
            <div class="alert alert-danger fs-3 alert-dismissible fade show mt-3" role="alert">
                <strong class="fs-4">Error!</strong> {{session('error')}}
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
                        <input type="text"  name="name" class="form-control fs-3 @error('name') is-invalid @enderror"
                               value="{{@$user? @$user->name : old('name') }}" placeholder="UserName">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong class="fs-4">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="email" name="email" class="form-control fs-3 @error('email') is-invalid @enderror"
                               value="{{@$user ? @$user->email : old('email') }}" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong class="fs-4">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="text" name="password" class="form-control fs-3 @error('password') is-invalid @enderror"
                               placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong class="fs-4">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="tel" name="phone" class="form-control fs-3 @error('phone') is-invalid @enderror"
                               value="{{@$user? @$user->phone : old('phone') }}" placeholder="Phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong class="fs-4">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="text" name="address" class="form-control fs-3 @error('address') is-invalid @enderror"
                               value="{{@$user? @$user->address : old('address') }}" placeholder="Address">
                        @error('address')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong class="fs-4">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <select name="role" class="form-select fs-3 @error('role') is-invalid @enderror"
                                aria-label="Default select example">
                            <option value="{{@$user? @$user->role : ''}}" selected>{{@$user? @$user->role : 'Select Role'}}</option>
                            <option value="director">Director</option>
                            <option value="manager">Manager</option>
                            <option value="shop_staff">Shop Staff</option>
                            <option value="user">User</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong class="fs-4">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 text-center mt-4">
                        <a href="{{route('user.index')}}" class="btn btn-danger fs-3 px-3">Cancel</a>
                        <button type="submit" name="add" class="px-3 btn btn-primary fs-3 float-right"> <i
                                class="fa fa-plus"></i>
                            {{@$user? 'Update' : 'Add'}}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
