@extends('layouts.website')
@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5 mb-5">
            <div class="col-md-8">
                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div
                        class="py-4 bg-white shadow p-4 rounded card">
                        <h1 class="h3 my-3 text-dark text-center">Sign Up</h1>
                        <div class="mt-5 px-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Name" name="name" required>
                            @error('name')
                            <span class="invalid-feedback">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-3 px-3">
                            <input class="form-control @error('email') is-invalid @enderror" placeholder="E-mail"
                                   name="email" required>
                            @error('email')
                            <span class="invalid-feedback">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mt-3 px-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password" name="password" required minlength="5"
                                   maxlength="10"  aria-describedby="basic-addon2" id="password">
                            <span class="input-group-text" id="basic-addon2"><i id="eye-icon" class="fa fa-eye-slash cursor-pointer"></i></span>
                            @error('password')
                            <span class="invalid-feedback">
                                @if(str_contains($message, 'format is invalid'))
                                    <strong>The password must be at least 1 uppercase , 1 lowercase , 1 number and 1 special character.</strong>
                                @else
                                    <strong>{{ $message }}</strong>
                                @endif
                        </span>
                            @enderror
                        </div>

                        <div class="mt-3 px-3 d-flex flex-column justify-content-start">
                            <input type="password" class="form-control" placeholder="Confirm Password"
                                   name="password_confirmation" required
                                   minlength="5" maxlength="10">
                        </div>
                        <div class="mt-3 px-3">
                            <select class="form-select @error('user_type') is-invalid @enderror" name="user_type"
                                    aria-label="Default select example" required>
                                <option selected hidden value="">Select User Type</option>
                                <option value="seller">Seller</option>
                                <option value="buyer">Buyer</option>
                            </select>
                            @error('user_type')
                            <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="mt-3 px-3">
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                   placeholder="{Postal Address}" name="address" required>
                            @error('address')
                            <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="mt-3 px-3">
                            <input type="text" class="form-control @error('zone') is-invalid @enderror" name="zone"
                                   id="zone" placeholder="Trading Zone" required>
                            @error('zone')
                            <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="mt-4 small text-secondary">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none">Sign in</a>
                        </div>

                        <div class="mt-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-dark w-75">
                                Create Account
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
