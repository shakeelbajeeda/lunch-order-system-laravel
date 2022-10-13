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
                                Update Shop Opening & closing Time
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-info text-center">Edit Shop Time</div>
        <form method="post" action="{{ route('update_shop_time',[@$shop->id]) }}" class="my-5" >
            @csrf
            @if(@$shop)
                @method('put')
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mt-4">
                        <input type="time" name="opening_time" class="form-control @error('opening_time') is-invalid @enderror"
                               value="{{ @$shop->opening_time }}" placeholder="opening time">
                        @error('opening_time')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="time" name="closing_time" class="form-control @error('closing_time') is-invalid @enderror"
                               value="{{ @$shop->closing_time }}" placeholder="Closing Time">
                        @error('closing_time')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4 text-center mt-4">
                        <button type="submit" class="px-5 btn btn-info float-right"> <i
                                class="fa fa-clock-o"></i>
                            Update
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
