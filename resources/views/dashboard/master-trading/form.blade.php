@extends('layouts.dashboard')
@section('content')
<div class="container" style="padding-bottom: 250px;">
    <div class="h1  text-dark text-center">{{ @$renewableEnergyType ? 'Edit' : 'Add' }} Renewable Energy Type</div>
    <form method="post" action="{{ @$renewableEnergyType ? route('renewable-energy-type.update', @$renewableEnergyType->id): route('renewable-energy-type.store') }}" class="my-5" >
        @csrf
        @if(@$renewableEnergyType)
            @method('put')
        @endif
        <div class="row">
            <div class="col-md-3 mt-4">
                <label for="energy_type">Energy Type</label>
                <input type="text" name="energy_type" class="form-control @error('energy_type') is-invalid @enderror"
                       value="{{ @$renewableEnergyType->energy_type ?? old('energy_type') }}" placeholder="Energy Type">
                @error('energy_type')
                <span class="invalid-feedback" role="alert" style="display: block !important">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-3 mt-4">
                <label for="market_price">Market Price</label>
                <input type="number" name="market_price" class="form-control @error('market_price') is-invalid @enderror"
                       value="{{ @$renewableEnergyType->market_price ?? old('market_price') }}" placeholder="Market Price">
                @error('market_price')
                <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-3 mt-4">
                <label for="administration_fee">Administration Fee</label>
                <input type="number" name="administration_fee" class="form-control @error('administration_fee') is-invalid @enderror"
                       value="{{ @$renewableEnergyType->administration_fee ?? old('administration_fee') }}" placeholder="Administration Fee">
                @error('administration_fee')
                <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-3 mt-4">
                <label for="tax">Tax</label>
                <input type="number" name="tax" class="form-control @error('tax') is-invalid @enderror"
                       value="{{ @$renewableEnergyType->tax ?? old('tax')}}" placeholder="Tax">
                @error('tax')
                <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-md-12 text-center mt-4">
                <a href="{{ route('renewable-energy-type.index') }}" class="px-5 fs-2 btn btn-danger">
                    Cancel
                </a>
                <button type="submit" class="px-5 fs-2 btn btn-primary">
                    {{ @$renewableEnergyType ? 'Update' : 'Submit' }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
