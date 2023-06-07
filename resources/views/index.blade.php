@extends('layouts.app')
@section('content')
    <h1 class="title">Renewable Energy Trading System</h1>
    <p><center><img src="{{asset('website/Images/TGET.jpg')}}" width="1000" height ="300"/><br></center></p>
    <div class="container mt-3">
        <h2>Search Renewable Energy</h2>
        <form action="{{ route('trading') }}" method="GET">
            <div class="form-group">
                <label for="energy-type">Energy Type:</label>
                <select name="energy" class="form-select" aria-label="Default select example">
                    <option value="" selected>Select Energy Type</option>
                    @foreach($energy_types as $item)
                        <option value="{{ $item->id }}">{{ ucwords($item->energy_type) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="location">Zone:</label>
                <select name="zone" class="form-select" aria-label="Default select example">
                    <option value="" selected>Select Zone</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                </select>
            </div>
            <button type="submit" class="btn btn-dark mt-3">Search</button>
        </form>
    </div>
@endsection
