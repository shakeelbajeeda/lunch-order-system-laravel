@extends('layouts.website')
@section('content')
    <div class="container">
        <div class="my-3">
            <a href="{{route('shop.create')}}" class="btn btn-primary fs-3">Add New Shop</a>
        </div>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fs-3 fade show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success fs-3 alert-dismissible fade show mt-3" role="alert">
                <strong>Success!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0 fs-2">Shops</h5>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th class="fs-3 fw-bold">Name</th>
                        <th class="fs-3 fw-bold">Owner</th>
                        <th class="fs-3 fw-bold">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($shops as $shop)
                        <tr>
                            <td class="fs-3">{{ $shop->name }}</td>
                            <td class="fs-3">{{ $shop->owner }}</td>
                            <td class=" d-flex">
                                <form method="POST" action="{{ route('shop.destroy', $shop->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger fs-3" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                <a class="ms-2 btn btn-info fs-3"
                                   href="{{ route('shop.edit', $shop->id) }}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
@endsection
