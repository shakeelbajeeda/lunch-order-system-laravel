@extends('layouts.website')

@section('content')
    <section id="form" data-aos="fade-up">
        <div class="container">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <strong>Error!</strong> {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h3 class="form__title">Login</h3>
            <div class="form__wrapper">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form__group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong class="fs-4">{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form__group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong class="fs-4">{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary fs-3">Login</button>
                </form>
            </div>
        </div>
    </section>
@endsection

