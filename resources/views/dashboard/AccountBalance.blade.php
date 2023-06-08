@extends('layouts.dashboard')
@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error!</strong> {{ session('error') }}.
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> {{ session('message') }}.
            </div>
        @endif
        <div class="py-3 text-center h2">
            Deposit Payments
        </div>
        <div class="h3 my-3 text-center text-primary">
            Your Current Balance is : $ {{ auth()->user()->balance }}
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="{{ route('deposit') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="amount">Enter Amount</label>
                        <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror"
                               placeholder="Enter Amount">
                        @error('amount')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input type="text" name="card_number" class="form-control @error('card_number') is-invalid @enderror"
                               placeholder="Card Number" maxlength="16">
                        @error('card_number')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="csv">Enter CSV</label>
                                <input type="text" name="csv" class="form-control @error('csv') is-invalid @enderror"
                                       placeholder="e.g 123" maxlength="3" minlength="3">
                                @error('csv')
                                <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="month">Month</label>
                                <input type="text" maxlength="2" name="month" class="form-control @error('month') is-invalid @enderror"
                                       placeholder="MM">
                                @error('month')
                                <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="text" name="year" maxlength="4" minlength="4" class="form-control @error('year') is-invalid @enderror"
                                       placeholder="YYYY">
                                @error('year')
                                <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block">Deposit Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div><br>
@endsection
