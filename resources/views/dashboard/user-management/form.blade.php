@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-success text-center">{{ @$user ? 'Edit' : 'Add New' }} User</div>
        <form method="post" action="{{ @$user ? route('users.update', @$user->id): route('users.store') }}" class="my-2" >
            @csrf
            @if(@$user)
                @method('put')
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mt-4">
                        <label for="name" class="text-success">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ @$user ? @$user->name : old('name') }}" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="email" class="text-success">E-mail Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ @$user ? @$user->email : old('email') }}" placeholder="E-mail">
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="user_type" class="text-success">User Type</label>
                        <select class="form-control @error('user_type') is-invalid @enderror" name="user_type">
                            <option value="{{ @$user ? @$user->user_type : old('user_type') }}" selected hidden>{{ @$user ? @$user->user_type : 'Select User Type' }}</option>
                            <option value="seller">Seller</option>
                            <option value="buyer">Buyer</option>
                            <option value="service_manager">Service Manager</option>
                        </select>
                        @error('user_type')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                     <strong>{{ $message }}</strong>
                     </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="is_active" class="text-success">Status</label>
                        <select class="form-control @error('is_active') is-invalid @enderror" name="is_active">
                            <option value="{{ @$user->is_active }}" selected hidden>{{ @$user ? @$user->is_active ? 'Activated' : 'Inactivated' : 'Select Status' }}</option>
                            <option value="1">Activated</option>
                            <option value="0">Inactivated</option>
                        </select>
                        @error('is_active')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                     <strong>{{ $message }}</strong>
                     </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="password" class="text-success">Password</label>
                        <input type="text" name="password" minlength="5" maxlength="10" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="address" class="text-success">Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                               value="{{ @$user ? @$user->address : old('address') }}" placeholder="Address">
                        @error('address')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="zone" class="text-success">Zone</label>
                        <input type="text" name="zone" class="form-control @error('zone') is-invalid @enderror"
                               value="{{ @$user ? @$user->zone : old('zone') }}" placeholder="Zone">
                        @error('zone')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 text-center mt-4">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-danger btn-block">Cancel</a>
                        <button type="submit" class="px-5 fs-2 btn btn-outline-success btn-block">
                            {{ @$user ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        @if (session()->has('message'))
        Swal.fire(
            'Good job!',
            '{{ session()->get('message') }}',
            'success'
        )
        @endif
        @if (session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `{{ session()->get('error') }}`,
        })
        @endif
    </script>
@endsection
