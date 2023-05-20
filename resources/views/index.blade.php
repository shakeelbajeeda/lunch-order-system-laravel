@extends('layouts.website')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="card bg-white shadow  p-4 rounded">
                <h1 class="h4 text-success mb-5 text-center"> Search Renewable</h1>
                    <form method="get" action="{{ route('trading') }}">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="type" class="form-label">Renewable Type</label>
                                <select name="energy_type" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Select Energy Type</option>
                                    @foreach($energy_types as $item)
                                        <option value="{{ $item->id }}">{{ ucwords($item->energy_type) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="zone" class="form-label">Zone</label>
                                <input name="zone" type="text" class="form-control" id="zone">
                            </div>
                            <div class="mb-3 mt-2 pt-4 col-md-4 ">
                                <button class="btn btn-outline-success btn-block w-100">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
