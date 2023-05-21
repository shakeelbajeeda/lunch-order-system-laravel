@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1 text-center text-success">Update Profile</div>
        <form method="post" action="{{ route('update-profile') }}" class="my-5" >
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mt-4">
                        <label class="text-success" for="name">Name</label>
                        <input disabled type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ auth()->user()->name }}" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="text-success" for="email">Email</label>
                        <input disabled type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ auth()->user()->email }}" placeholder="E-mail">
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="text-success" for="user_type">User Type</label>
                        <select disabled class="form-control @error('user_type') is-invalid @enderror" name="user_type">
                            <option value="{{ auth()->user()->user_type }}" selected hidden>{{ ucwords(str_replace('_', ' ', auth()->user()->user_type)) ?? 'Select User Type' }}</option>
                            <option value="seller">Seller</option>
                            <option value="buyer">Buyer</option>
                        </select>
                        @error('user_type')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                     <strong>{{ $message }}</strong>
                     </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="text-success" for="password">Password</label>
                        <input type="text" name="password" minlength="5" maxlength="10" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="text-success" for="address">Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                               value="{{ auth()->user()->address }}" placeholder="Address">
                        @error('address')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="text-success" for="zone">Zone</label>
                        <input type="text" name="zone" class="form-control @error('zone') is-invalid @enderror"
                               value="{{ auth()->user()->zone }}" placeholder="Zone">
                        @error('zone')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ url('/profile') }}" class="px-5 fs-2 btn btn-outline-danger btn-block mt-4">
                                Cancel
                            </a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="px-5 fs-2 btn btn-outline-success btn-block mt-4">
                                Update
                            </button>
                        </div>
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
