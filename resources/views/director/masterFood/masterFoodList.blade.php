@extends('layouts.website')
@section('content')
    <div class="header-bg vh-50 d-flex">
        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="text-center">Master Food & Beverage List</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Start Here -->
    <section>
        <div class="container my-5">
            <div class="pb-5">
                <a href="{{route('products.create')}}" class="btn-style rounded-pill text-decoration-none"><i class="fa fa-plus me-2"></i>Add Food & Beverage</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><img src="{{asset('storage/'.$product->image)}}" width="100px" alt=""></td>
                            <td class="align-middle">{{$product->title}}</td>
                            <td class="align-middle">{{$product->description}}</td>
                            <td class="align-middle">{{$product->price}} $</td>
                            <td class="align-middle">{{$product->created_at}}</td>
                            <td class="align-middle">
                                <a href="{{route('products.edit', [$product->id])}}"><i class="fa fa-edit fs-4"></i></a>
                                <a href="{{route('products_destroy', [$product->id])}}"><i class="fa fa-trash text-danger fs-4"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Section End Here -->
@endsection
