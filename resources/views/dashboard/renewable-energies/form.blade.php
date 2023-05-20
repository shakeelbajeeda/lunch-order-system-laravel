@extends('layouts.dashboard')
@section('content')
<div class="container" style="padding-bottom: 250px;">
    <div class="h1  text-dark text-center">{{ @$renewableEnergy ? 'Edit' : 'Add' }} Renewable Energy</div>
    <form method="post" action="{{ @$renewableEnergy ? route('renewable-energies.update', @$renewableEnergy->id): route('renewable-energies.store') }}" class="my-5" >
        @csrf
        @if(@$renewableEnergy)
            @method('put')
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mt-4">
                    <select class="form-control @error('renewable_energy_type_id') is-invalid @enderror" name="renewable_energy_type_id">
                        @if(!@$renewableEnergy)
                            <option  value="" selected> Select Energy Type </option>
                        @endif
                        @foreach($renewable_energy_types as $item)
                            <option value="{{ $item->id }}" {{ @$renewableEnergy->renewable_energy_type_id == $item->id || old('renewable_energy_type_id') == $item->id  ? 'selected' : '' }}>{{ ucwords($item->energy_type) }}</option>
                        @endforeach
                    </select>
                    @error('renewable_energy_type_id')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                     <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <input type="number" name="volume" class="form-control @error('volume') is-invalid @enderror"
                           value="{{ @$renewableEnergy ? @$renewableEnergy->volume : old('volume') }}" placeholder="Volume">
                    @error('volume')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                           value="{{ @$renewableEnergy ? @$renewableEnergy->price : old('price') }}" placeholder="Price">
                    @error('price')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 text-center mt-4">
                <button type="submit" class="px-5 fs-2 btn btn-primary">
                    {{ @$renewableEnergy ? 'Update' : 'Submit' }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        @if (session()->has('message'))
        toastMixin.fire({
            animation: true,
            title: '{{ session()->get('message') }}'
        });
        @endif
        @if (session()->has('error'))
        toastMixin.fire({
            animation: true,
            icon: 'error',
            title: '{{ session()->get('error') }}'
        });
        @endif
    </script>
@endsection
