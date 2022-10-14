@extends('layouts.website')
@section('content')
    <div class="container">
        <div class="my-3">
            <a href="{{route('product.create')}}" class="btn btn-primary fs-3">Add New Product</a>
        </div>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade fs-3 show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade fs-3 show mt-3" role="alert">
                <strong>Success!</strong> {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0 fs-2">Master & Beverage List</h5>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th class="fw-bold fs-3">Image</th>
                        <th class="fw-bold fs-3">Title</th>
                        <th class="fw-bold fs-3" >Price</th>
                        <th class="fw-bold fs-3">Description</th>
                        <th class="fw-bold fs-3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src="{{$product->image}}" alt="product" style="height: 70px" width="70px"></td>
                            <td class="align-middle fs-3">{{ $product->title }}</td>
                            <td class="align-middle fs-3">$ {{ $product->price }}</td>
                            <td class="align-middle fs-3">{{ $product->description }}</td>
                            <td class="d-flex">
                                <form method="POST" class="mt-4" action="{{ route('product.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger fs-3" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                <a class="ms-2 btn btn-info fs-3 mt-4"
                                   href="{{ route('product.edit', $product->id) }}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
@endsection
