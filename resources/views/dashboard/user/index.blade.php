@extends('layouts.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Form</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Deposit More Funds
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="py-3 text-info text-center h2">
            Deposit More Funds
        </div>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Success!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="h3 my-3 text-center text-info">
            Your Current Balance is : $ {{ auth()->user()->balance }}
        </div>
       <div class="row justify-content-center mt-5">
           <div class="col-md-6">
               <form action="{{route('deposit')}}" method="post">
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
                                      placeholder="e.g 123">
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
                               <input type="text" name="month" class="form-control @error('month') is-invalid @enderror"
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
                               <input type="text" name="year" class="form-control @error('year') is-invalid @enderror"
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
                       <button class="btn btn-info btn-block">Deposit Payment</button>
                   </div>
               </form>
           </div>
       </div>
    </div><br>
@endsection
