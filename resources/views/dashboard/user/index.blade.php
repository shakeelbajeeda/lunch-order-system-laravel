@extends('layouts.website')
@section('content')
    <div class="container">
        <div class="py-3 text-info text-center h2">
            Deposit More Money
        </div>
        @if(session('error'))
            <div class="alert alert-danger fs-3 alert-dismissible fade show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success fs-3 alert-dismissible fade show mt-3" role="alert">
                <strong>Success!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="h3 my-3 text-center text-primary">
            Your Card Data Aleardy Added to the Database now you can enter amount in input field to add balance to your account
        </div>
        <div class="h3 my-3 text-center text-primary">
            Your Current Balance is : $ {{ auth()->user()->balance }}
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="{{route('deposit')}}" method="post">
                    @csrf
                    <div class="form-group fs-3">
                        <label for="amount">Enter Amount</label>
                        <input type="text" name="amount" class="form-control fs-3 @error('amount') is-invalid @enderror"
                               placeholder="Enter Amount">
                        @error('amount')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong class="fs-4">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                        <input type="hidden" name="card_number" value="{{auth()->user()->card_number}}"
                               placeholder="Card Number">
                        <input type="hidden" name="csv" value="{{auth()->user()->cvc}}"
                               placeholder="e.g 123">

                        <input type="hidden" value="{{auth()->user()->card_expiry}}" name="month">
                        <input type="hidden" name="year" value="{{auth()->user()->card_expiry}}">
                        <button class="btn btn-primary fs-3 mt-3 btn-block">Deposit Money</button>
                </form>
            </div>
        </div>
    </div><br>
@endsection
