@extends('layouts.app')
@section('content')
    <h1 class="title">Renewable Energy Trading System</h1>
    <p><center><img src="{{asset('website/Images/TGET.jpg')}}" width="1000" height ="300"/><br></center></p>
    <div class="container mt-3">
        <h2>Search Renewable Energy</h2>
        <form>
            <div class="form-group">
                <label for="energy-type">Energy Type:</label>
                <select class="form-control" id="energy-type">
                    <option>Wind</option>
                    <option>Solar</option>
                    <option>Hydro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Zone:</label>
                <input type="text" class="form-control" id="location" placeholder="Enter location">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
@endsection
