@extends('layouts.app')
@section('content')
<div class="container">
    <div class="vh-100 d-flex">
        <div class="m-auto">
            <div class="container header-bg p-5 rounded">
                <div class="fs-3 text-center">Register Account</div>
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="mt-3">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="mt-3">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="mt-4">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <i class="fa fa-eye-slash fa-lg float-end pe-2"
                           id="togglePassword"></i>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                     <div class="form-group">
                         <label for="password_confirmation" class="mt-4">Confirm Password</label>
                         <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                         <i class="fa fa-eye-slash fa-lg float-end pe-2"
                            id="togglePasswordConfirmation"></i>
                     </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="border-0 btn-style rounded-pill px-5 create_account"><i class="fa fa-lock me-2"></i> Register</button>
                    </div>
                </form>
                <div class="row mt-4">
                    <div class="col-6">
                        <a href="{{url('/')}}" class="text-decoration-none text-secondary">Go Website</a>
                    </div>
                    <div class="col-6">
                        <div class="float-end">
                            <a href="{{route('login')}}" class="text-decoration-none clr">Login ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
