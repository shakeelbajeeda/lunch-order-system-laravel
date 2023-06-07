@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-5">
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div
                        class="text-center py-4 bg-white p-4 rounded">
                        <h1 class="h3 my-3 text-dark">Login</h1>
                        <div class="mt-3">
                            <input name="email" type="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email Address" required>
                            @error('email')
                            <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mt-3 input-group">
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                   required>
                            @error('password')
                            <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark w-100 mt-3">
                            Login
                        </button>
                        <div class="mt-2 small text-secondary float-end">
                            Don't Have An Account?
                            <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
