@extends('layouts.dashboard')
@section('content')
<div class="container" style="padding-bottom: 250px;">
    <div class="h1  text-success text-center">{{ @$renewableEnergy ? 'Edit' : 'Add' }} Renewable Energy</div>
    <form method="post" action="{{ @$renewableEnergy ? route('energies.update', @$renewableEnergy->id): route('energies.store') }}" class="my-5" >
        @csrf
        @if(@$renewableEnergy)
            @method('put')
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mt-4">
                    <label for="energy_type" class="text-success">Select Energy Type</label>
                    <select class="form-control @error('all_energy_type_id') is-invalid @enderror" name="all_energy_type_id">
                        @if(!@$renewableEnergy)
                            <option  value="" selected> Select Energy Type </option>
                        @endif
                        @foreach($all_energy_types as $item)
                            <option value="{{ $item->id }}" {{ @$renewableEnergy->all_energy_type_id == $item->id || old('all_energy_type_id') == $item->id  ? 'selected' : '' }}>{{ ucwords($item->type) }}</option>
                        @endforeach
                    </select>
                    @error('all_energy_type_id')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                     <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="energy_volume" class="text-success">Available Volume</label>
                    <input type="number" name="energy_volume" class="form-control @error('energy_volume') is-invalid @enderror"
                           value="{{ @$renewableEnergy ? @$renewableEnergy->energy_volume : old('energy_volume') }}" placeholder="Volume">
                    @error('energy_volume')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="energy_price" class="text-success">Price</label>
                    <input type="number" name="energy_price" class="form-control @error('energy_price') is-invalid @enderror"
                           value="{{ @$renewableEnergy ? @$renewableEnergy->energy_price : old('energy_price') }}" placeholder="Price">
                    @error('energy_price')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 text-center mt-4">
                    <a href="{{ route('energies.index') }}" class="btn-block px-5 fs-2 btn btn-outline-danger">
                        Cancel
                    </a>
                    <button type="submit" class="px-5 fs-2 btn btn-outline-success btn-block">
                        {{ @$renewableEnergy ? 'Update' : 'Submit' }}
                    </button>
                </div>
            </div>
        </div>
    </form>
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
