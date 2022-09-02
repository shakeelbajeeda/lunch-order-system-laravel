@extends('layouts.director')
@section('content')
    <div class="col-md-9">
        <form action="{{@$user? route('users.update',[@$user->id]): route('users.store')}}" method="post">
            @csrf
            @if(@$user)
                @method('put')
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="mt-3">Name</label>
                        <input type="text" name="name" id="name" value="{{@$user ? @$user->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="mt-3">Email</label>
                        <input type="email" name="email" id="email" value="{{@$user ? @$user->email : old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="mt-4">Password</label>
                        <input type="text" name="password" id="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role" class="mt-4">Role</label>
                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                            <option value="{{@$user ? @$user->role : ''}}" selected hidden>{{@$user ? @$user->role : 'Select Role'}}</option>
                            <option>user</option>
                            <option>shop staff</option>
                            <option>manager</option>
                            <option>director</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="float-end mt-4">
                <a href="{{route('users.index')}}" class="btn btn-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="border-0 btn-style rounded-pill px-5 create_account"><i class="{{@$user ? 'fa fa-clock-o me-2' : 'fa fa-plus me-2'}}"></i>{{@$user ? 'Update' : 'Add'}}</button>
            </div>
        </form>

    </div>
@endsection
