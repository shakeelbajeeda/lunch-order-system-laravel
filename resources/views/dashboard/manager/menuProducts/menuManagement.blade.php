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
                                Shop Menu Products
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center text-info h1 my-3">
          Shop  Menu Products
        </div>
        <div class="my-3">
            <a href="{{route('masterFoodList')}}" class="btn btn-info">Add New Product to Menu</a>
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
                    <h5 class="card-title mb-0">Shop Menu Products Table</h5>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th >Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($shop->products as $product)
                        <tr>
                            <td><img src="{{$product->image}}" alt="product" height="100px" width="100px"></td>
                            <td class="align-middle">{{ $product->title }}</td>
                            <td class="align-middle">$ {{ $product->price }}</td>
                            <td class="align-middle">{{ $product->description }}</td>
                            <td class="align-middle">
                                <a class="me-3 btn btn-danger"
                                   href="{{ route('remove_from_menu', $product->id) }}"><i class="fa fa-trash me-2"></i>Remove Product</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
@endsection
