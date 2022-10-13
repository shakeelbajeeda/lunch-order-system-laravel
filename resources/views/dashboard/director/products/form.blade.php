@extends('layouts.dashboard')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Form</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Create Master Food & Beverage
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-info text-center">{{@$product? 'Edit Product' : 'Add Product'}}</div>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="post" action="{{@$product? route('product.update',[@$product->id]): route('product.store') }}" class="my-5" enctype="multipart/form-data">
            @csrf
            @if(@$product)
                @method('put')
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mt-4">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{@$product? @$product->title : old('title') }}" placeholder="Title">
                        @error('title')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                               value="{{@$product ? @$product->price : old('price') }}" placeholder="Price">
                        @error('price')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-4">
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{@$product? @$product->description : old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 text-center mt-4">
                        <a href="{{route('product.index')}}" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="add" class="px-5 btn btn-primary float-right"> <i
                                class="fa fa-plus"></i>
                            {{@$product? 'Update' : 'Add'}}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
