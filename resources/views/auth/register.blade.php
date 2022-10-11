@extends('layouts.app')

@section('content')

    <div class="login">
        <div class="login-triangle"></div>
        <h2 class="login-header">Register Account</h2>
        <form class="login-container" action="{{route('register')}}" method="post">
            @csrf
            <div class="form-group mt-3">
             <input type="text" placeholder="Name" name="name" class="@error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3">
             <input type="email" placeholder="Email" name="email" class="@error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3">
             <input type="text" placeholder="Address" name="address" class="@error('address') is-invalid @enderror">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3">
             <input type="tel" placeholder="Phone No" name="phone" class="@error('phone') is-invalid @enderror">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <select name="role" class="form-select" required>
                    <option value="">Select Role</option>
                    <option value="user">Student</option>
                    <option value="employee">Employee</option>
                </select>
                   @error('role')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
               </div>
            <div class="form-group mt-3">
             <input type="password" placeholder="Password" name="password" class="@error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3">
             <input type="password" placeholder="Confirm Password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror">
            </div>
            <div class="my-3">
            <input type="submit" value="Register">
            </div>
            <div>
                <a href="{{route('login')}}">If you already have an account? Login</a>
            </div>
        </form>
    </div>
@endsection
