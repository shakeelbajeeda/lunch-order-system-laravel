@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">{{@$user? 'Edit User' : 'Add User'}}</div>
        <form method="post" action="{{@$user? route('user.update',[@$user->id]): route('user.store') }}" class="my-5" enctype="multipart/form-data">
            @csrf
            @if(@$user)
                @method('put')
            @endif
            <div class="row">
                <div class="col-md-4 mt-4">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{@$user? @$user->name : old('name') }}" placeholder="UserName">
                    @error('name')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{@$user ? @$user->email : old('email') }}" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                           value="{{@$user? @$user->phone : old('phone') }}" placeholder="Phone">
                    @error('phone')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                           value="{{@$user? @$user->address : old('address') }}" placeholder="Address">
                    @error('address')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <select name="role" class="form-control @error('role') is-invalid @enderror"
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
                    <button type="submit" name="add" class="px-5 fs-2 btn btn-primary float-right"> <i
                            class="fa fa-plus"></i>
                     {{@$user? 'Update' : 'Add'}}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        @if (session()->has('error'))
        toastMixin.fire({
            animation: true,
            icon: 'error',
            title: '{{ session()->get('error') }}'
        });
        @endif
    </script>
@endsection
