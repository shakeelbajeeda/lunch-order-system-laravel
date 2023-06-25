@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mx-auto">
                    <h2 class="py-4">My Balance => {{ auth()->user()->account_balance }}</h2>
                    <h2 class="text-center text-success">Add Balance</h2>
                    <div class="text-center">
                        <img src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px"/>
                    </div>
                    <form class="card-details" method="post" action="{{ route('deposit') }}">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="mb-2">
                                <p class="text-success mb-0">Amount</p>
                                <input type="text" name="amount" class=" form-control @error('amount') is-invalid @enderror" placeholder="e.g 10" id="exp">
                                @error('amount')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <p class="text-success">Card Number</p>
                            <input type="text" name="card_number" placeholder="1234 5678 9012 3457" class="form-control @error('card_number') is-invalid @enderror"  id="cno"
                                   minlength="16" maxlength="16">
                            <span>
                            Hint: Card Number is 4242424242424242
                            </span>
                            @error('card_number')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <div class="form-group pt-2">
                            <div class="row d-flex">
                                <div class="col-sm-4">
                                    <p class="text-success mb-0">Expiration Month</p>
                                    <input type="text" name="expiry_month" class="form-control @error('expiry_month') is-invalid @enderror" maxlength="2" placeholder="MM" id="exp">
                                    @error('expiry_month')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <p class="text-success mb-0">Cvv</p>
                                    <input type="text" name="cvv" class="form-control @error('cvv') is-invalid @enderror" placeholder="123" size="1" minlength="3"
                                           maxlength="3">
                                    @error('cvv')
                                    <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5 mt-4">
                                    <button type="submit" class="btn btn-outline-success"><i
                                            class="fas fa-arrow-right px-3"></i></button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                    <div class="pt-5">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        @if (session()->has('message'))
        Swal.fire(
            'Good job!',
            '{{ session()->get('message') }}',
            'success'
        )
        @endif
        @if (session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `{{ session()->get('error') }}`,
        })
        @endif
    </script>
@endsection
