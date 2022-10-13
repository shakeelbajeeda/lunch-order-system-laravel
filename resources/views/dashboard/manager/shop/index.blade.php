@extends('layouts.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tables</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">
                              Update Shop Opening & Closing Time
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="py-3 text-center text-info h2">
            Shop Opening & Closing Time
        </div>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Success!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">  Shop Opening & Closing Time</h5>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Opening Time</th>
                        <th>Closing Time</th>
                        <th class="w_120">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $shop->name }}</td>
                        <td>{{date('h:i A', strtotime($shop->opening_time))}}</td>
                        <td>{{date('h:i A', strtotime($shop->closing_time))}}</td>
                        <td>
                            <a class="ml-3 btn btn-info" style="height: 40px"
                               href="{{ route('get_shop_time', $shop->id) }}"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
@endsection
