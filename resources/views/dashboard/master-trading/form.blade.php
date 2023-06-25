@extends('layouts.dashboard')
@section('content')
<div class="container" style="padding-bottom: 250px;">
    <div class="h1 text-center text-success">{{ @$allEnergyType ? 'Edit' : 'Add' }} Master Trading Energy</div>
    <form method="post" action="{{ @$allEnergyType ? route('all-energy-types.update', @$allEnergyType->id): route('all-energy-types.store') }}" class="my-5" >
        @csrf
        @if(@$allEnergyType)
            @method('put')
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mt-4">
                    <label for="type" class="text-success">Renewable Energy Type</label>
                    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
                           value="{{ @$allEnergyType->type ?? old('type') }}" placeholder="Energy Type">
                    @error('type')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                     <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="price" class="text-success">Market Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                           value="{{ @$allEnergyType->price ?? old('price') }}" placeholder="Market Price">
                    @error('price')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="administration_fee" class="text-success">Administration Fee</label>
                    <input type="number" name="administration_fee" class="form-control @error('administration_fee') is-invalid @enderror"
                           value="{{ @$allEnergyType->administration_fee ?? old('administration_fee') }}" placeholder="Administration Fee">
                    @error('administration_fee')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="energy_tax" class="text-success">Tax</label>
                    <input type="number" name="energy_tax" class="form-control @error('energy_tax') is-invalid @enderror"
                           value="{{ @$allEnergyType->energy_tax ?? old('energy_tax')}}" placeholder="Tax">
                    @error('energy_tax')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 text-center mt-4">
                    <a href="{{ route('all-energy-types.index') }}" class="fs-2 btn btn-outline-danger btn-block">
                        Cancel
                    </a>
                    <button type="submit" class="fs-2 btn btn-outline-success btn-block">
                        {{ @$allEnergyType ? 'Update' : 'Submit' }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
