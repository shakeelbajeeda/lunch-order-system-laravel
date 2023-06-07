@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1 text-center">{{ @$renewableEnergy ? 'Edit' : 'Add' }} Energy</div>
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
        <form method="post"
              action="{{ @$renewableEnergy ? route('renewable-energies.update', @$renewableEnergy->id): route('renewable-energies.store') }}"
              class="my-5">
            @csrf
            @if(@$renewableEnergy)
                @method('put')
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div>
                        <label for="energy_type">Select Energy Type</label>
                        <select class="form-control @error('renewable_energy_type_id') is-invalid @enderror"
                                name="renewable_energy_type_id">
                            @if(!@$renewableEnergy)
                                <option value="" selected> Select Energy Type</option>
                            @endif
                            @foreach($renewable_energy_types as $item)
                                <option
                                    value="{{ $item->id }}" {{ @$renewableEnergy->renewable_energy_type_id == $item->id || old('renewable_energy_type_id') == $item->id  ? 'selected' : '' }}>{{ ucwords($item->energy_type) }}</option>
                            @endforeach
                        </select>
                        @error('renewable_energy_type_id')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                     <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="volume">Available Volume</label>
                        <input type="number" name="volume" class="form-control @error('volume') is-invalid @enderror"
                               value="{{ @$renewableEnergy ? @$renewableEnergy->volume : old('volume') }}"
                               placeholder="Volume">
                        @error('volume')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="energy_type">Price</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                               value="{{ @$renewableEnergy ? @$renewableEnergy->price : old('price') }}"
                               placeholder="Price">
                        @error('price')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 text-center mt-4">
                        <a href="{{ route('renewable-energies.index') }}" class="px-5 btn btn-danger">
                            Cancel
                        </a>
                        <button type="submit" class="px-5 btn btn-dark">
                            {{ @$renewableEnergy ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
