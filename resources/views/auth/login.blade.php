@extends('layouts.app')
@section('content')
    <div class="vh-100 d-flex">
        <div class="m-auto">
            <div class="container header-bg p-5 rounded">
                <div class="fs-3 text-center">Login Account</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="mt-3">Email</label>
                        <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
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
                    <div class="text-center mt-4">
                        <button type="submit" class="border-0 btn-style rounded-pill px-5"><i class="fa fa-lock me-2"></i> Login</button>
                    </div>
                </form>
                <div class="row mt-4">
                    <div class="col-6">
                        <a href="{{url('/')}}" class="text-decoration-none text-secondary">Go Website</a>
                    </div>
                    <div class="col-6">
                        <div class="float-end">
                            <a href="{{route('register')}}" class="text-decoration-none clr">Create Account ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
