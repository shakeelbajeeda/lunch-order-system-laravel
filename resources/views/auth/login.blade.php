@extends('layouts.app')

@section('content')
    <div class="login">
        <div class="login-triangle"></div>

        <h2 class="login-header">Login Account</h2>

        <form class="login-container" action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group">
            <input type="email" placeholder="Email" name="email"  class="@error('email') is-invalid @enderror">
                @error('email')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{$message}}</strong>
                 </span>
                @enderror
            </div>
            <div class="form-group mt-4">
            <input type="password" placeholder="Password" name="password" class="@error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="my-4">
            <input type="submit" value="Login">
            </div>
            <a href="{{url('/')}}">Go Website</a> <a href="{{route('register')}}" class="float-end">Register?</a>
        </form>
    </div>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        @if (session()->has('error'))
        toastMixin.fire({
            animation: true,
            icon: 'error',
            title: '{{ session()->get('error') }}'
        });
        @endif
    </script>
@endsection
