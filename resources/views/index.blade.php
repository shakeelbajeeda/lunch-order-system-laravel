@extends('layouts.website')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <button class="btn btn-success w-100" data-bs-toggle="modal"
                        data-bs-target="#buyModal">Search Energy</button>
            </div>
        </div>
        <div class="modal fade p-5" id="buyModal" aria-labelledby="buyModalLabel">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h1 class="modal-title fs-5" id="buyModalLabel">Search Energy</h1>
                    </div>
                    <form method="get" action="{{ route('view.trading') }}">
                        <div class="row px-3">
                            <div class="mb-3 col-md-4">
                                <label for="type" class="form-label">Renewable Type</label>
                                <select name="energy_type" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Select Energy Type</option>
                                    @foreach($energy_types as $item)
                                        <option value="{{ $item->id }}">{{ ucwords($item->type) }}</option>
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
