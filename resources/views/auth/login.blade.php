@extends('layouts.website')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <div class="container-fluid d-flex justify-content-center align-items-center h-100 pt-5">
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div
                                class="text-center py-4 bg-white shadow p-4 rounded card">
                                <h1 class="h3 my-3 text-dark">Log In</h1>
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
                                    <span class="input-group-text"><i id="eye-icon"
                                                                      class="fa fa-eye-slash cursor-pointer"></i></span>
                                    @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-4 small text-secondary">
                                    Dont' have an account?
                                    <a href="{{ route('register') }}" class="text-decoration-none">Sign Up</a>
                                </div>

                                <div class="mt-2 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-dark w-75 ">
                                        Log In
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
