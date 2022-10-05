@extends('layouts.website')
@section('content')
        <div class="header-bg vh-50 d-flex">
            <div class="container m-auto">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h1 class="text-center">Add Items to the Menu</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Start Here -->
        <section>
            <div class="container my-5">
                <div class="text-center">
                    @if(session()->has('message'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Warning!</strong> {{session()->get('message')}}
                    </div>
                    @endif
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
                                    <a href="{{route('addToMenu', [$product->id])}}" class="btn btn-primary rounded-pill"><i class="fa fa-plus me-2"></i>Add to Menu</a>
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
