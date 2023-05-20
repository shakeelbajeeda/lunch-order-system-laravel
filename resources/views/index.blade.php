@extends('layouts.website')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <div class="card bg-white shadow  p-4 rounded">

                <h1 class="h4 text-dark mb-5 text-center text-uppercase"> Search Renewable</h1>
                    <form method="get" action="{{ route('trading') }}">
                        <div class="mb-3">
                            <label for="type" class="form-label">Renewable Type</label>
                            <select name="energy_type" class="form-select" aria-label="Default select example">
                                <option value="" selected>Select Energy Type</option>
                                @foreach($energy_types as $item)
                                    <option value="{{ $item->id }}">{{ ucwords($item->energy_type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="zone" class="form-label">Zone</label>
                            <input name="zone" type="text" class="form-control" id="zone">
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <button class="btn btn-outline-dark w-50">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
