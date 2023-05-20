@extends('layouts.dashboard')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        .payment-bg {
            background: linear-gradient(to right, rgba(235, 224, 232, 1) 52%, rgba(254, 191, 1, 1) 53%, rgba(254, 191, 1, 1) 100%);
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border: none;
            max-width: 450px;
            border-radius: 15px;
            margin: 150px 0 150px;
            padding: 35px;
            padding-bottom: 20px !important;
        }

        .heading {
            color: #C1C1C1;
            font-size: 14px;
            font-weight: 500;
        }

        img {
            transform: translate(160px, -10px);
        }

        img:hover {
            cursor: pointer;
        }

        .text-warning {
            font-size: 12px;
            font-weight: 500;
            color: #edb537 !important;
        }

        #cno {
            transform: translateY(-10px);
        }

        input {
            border-bottom: 1.5px solid #E8E5D2 !important;
            border-radius: 0;
            border: 0;

        }

        .form-group input:focus {
            border: 0;
            outline: 0;
        }

        .col-sm-5 {
            padding-left: 90px;
        }

        .btn {
            background: #F3A002 !important;
            border: none;
            border-radius: 30px;
        }

        .btn:focus {
            box-shadow: none;
        }
    </style>
    <div class="container-fluid payment-bg">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12">
                <div class="card mx-auto">
                    <p class="heading">PAYMENT DETAILS</p>
                    <form class="card-details" method="post" action="{{ route('deposit') }}">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="mb-2">
                                <p class="text-warning mb-0">Amount</p>
                                <input type="text" name="amount" class="@error('amount') is-invalid @enderror" placeholder="e.g 10" id="exp">
                                @error('amount')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <p class="text-warning">Card Number</p>
                            <input type="text" name="card_number" placeholder="1234 5678 9012 3457" class="@error('card_number') is-invalid @enderror"  id="cno"
                                   minlength="16" maxlength="16">
                            @error('card_number')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
{{--                            <img src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px"/>--}}
                        <div class="form-group pt-2">
                            <div class="row d-flex">
                                <div class="col-sm-4">
                                    <p class="text-warning mb-0">Expiration Month</p>
                                    <input type="text" name="expiry_month" class="@error('expiry_month') is-invalid @enderror" maxlength="2" placeholder="MM" id="exp">
                                    @error('expiry_month')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <p class="text-warning mb-0">Cvv</p>
                                    <input type="text" name="cvv" class="@error('cvv') is-invalid @enderror" placeholder="123" size="1" minlength="3"
                                           maxlength="3">
                                    @error('cvv')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5 pt-0">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fas fa-arrow-right px-3 py-2"></i></button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                    <div class="pt-5">
                        Hint: Test card is 4242424242424242
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
