@extends('layouts.manager')
@section('content')
    <div class="col-md-9">
        <div class="container">
            <div class="text-center">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Success!</strong> {{session()->get('message')}}
                    </div>
                @endif
            </div>
            <div>
                <a href="{{route('getProducts')}}" class="btn btn-primary rounded-pill"><i class="fa fa-plus me-2"></i>Add product to menu</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shop->products as $product)
                        <tr>
                            <td><img src="{{$product->image}}" width="100px" alt=""></td>
                            <td class="align-middle">{{$product->title}}</td>
                            <td class="align-middle">{{$product->description}}</td>
                            <td class="align-middle">{{$product->price}} $</td>
                            <td class="align-middle">
                                <a href="{{route('removeFromMenu', [$product->id])}}" class="text-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
