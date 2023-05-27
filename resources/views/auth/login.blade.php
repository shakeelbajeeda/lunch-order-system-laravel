@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="justify-content-center align-items-center">
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div
                                class="text-center py-4 bg-white shadow p-4 rounded card">
                                <h1 class="h3 my-3 text-success">Log In Account</h1>
                                <div class="mt-3 px-3">
                                    <input name="email" type="email" value="{{ old('email') }}"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="E-mail" required>
                                    @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-3 px-3 input-group">
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                           required>
                                    @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-4 small text-secondary">
                                    If You Don't Have An Account?
                                    <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
                                </div>

                                <div class="mt-2 col-md-12">
                                    <button type="submit" class="btn btn-outline-success btn-block">
                                        Log In Account
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
