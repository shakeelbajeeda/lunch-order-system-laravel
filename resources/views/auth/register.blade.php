@extends('layouts.website')
@section('content')
    <div class="container">
        <h3 class="form__title">Registration</h3>
        <div class="form__wrapper">
            <form class="form" action="{{route('register')}}" method="post">
                @csrf
                <!-- <h1>Sign Up</h1> -->
                <div class="form-field form__group">
                    <!-- <label for="username">Username:</label> -->
                    <label for="username">UserName</label>
                    <input type="text" name="name" id="username" class="form-control @error('name') is-invalid @enderror" placeholder="Enter UserName" autocomplete="off" value="{{old('name')}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-field form__group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" autocomplete="off"  value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-field form__group">
                    <label for="Credit Card Number">Credit Card No:</label>
                    <input type="text" name="card_number" maxlength="16" id="credit_card_number" placeholder="Enter 16 Digit Card Number" class="form-control @error('card_number') is-invalid @enderror" autocomplete="off"  value="{{old('card_number')}}">
                    @error('card_number')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-field form__group">
                    <label for="CVV Number">CVC No:</label>
                    <input type="text" name="cvc" id="cvv_number" placeholder="e.g 123" class="form-control @error('cvc') is-invalid @enderror" autocomplete="off"  value="{{old('cvc')}}">
                    @error('cvc')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-field form__group">
                    <label for="Expire Date">Expire Date</label>
                    <input type="date" name="card_expiry" id="expire_date" class="form-control @error('card_expiry') is-invalid @enderror" autocomplete="off"  value="{{old('card_expiry')}}">
                    @error('card_expiry')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-field form__group">
                    <label for="Contact Number">Phone No:</label>
                    <input type="text" name="phone" placeholder="Enter Phone No" class="form-control @error('phone') is-invalid @enderror" id="contactnumber" autocomplete="off"  value="{{old('phone')}}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-field form__group">
                    <label for="password">Password:</label>
                    <input type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-field form__group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" placeholder="Enter Confirm Password" class="form-control " name="password_confirmation" id="confirm-password" autocomplete="off">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-field form__group">
                    <label for="address">Address:</label>
                    <input type="text" placeholder="Address" name="address" class="form-control @error('address') is-invalid @enderror" autocomplete="off"  value="{{old('password')}}">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-field form__group">
                    <label for="email">User Type:</label>
                    <select type="text" name="user_type" id="email" class="form-select @error('user_type') is-invalid @enderror" autocomplete="off">
                        <option selected  value="{{old('user_type')}}">Select User Type</option>
                        <option value="student">Student</option>
                        <option value="employee">Employee</option>
                    </select>
                    @error('user_type')
                    <span class="invalid-feedback" role="alert">
                       <strong class="fs-4">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-field form__group">
                    <!-- <input type="submit" value="Sign Up"> -->
                    <button type="submit" class="btn btn-primary fs-3">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
