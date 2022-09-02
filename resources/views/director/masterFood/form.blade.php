@extends('layouts.website')
@section('content')
    <div class="header-bg vh-50 d-flex">
        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="text-center">Add Master Food & Beverage</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Start Here -->
    <section>
        <div class="container my-5">
            <form action="{{@$product ? route('products.update',[@$product->id]) : route('products.store')}}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @if(@$product)
                    @method('put')
                @endif
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" id="title" value="{{@$product->title}}" name="title"
                                           placeholder="Title"
                                           class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" value="{{@$product->price}}" placeholder="Price" id="price"
                                           name="price" class="form-control @error('price') is-invalid @enderror">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" id="image" name="image"
                                           class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="des">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="des"
                                      name="description" placeholder="Description"
                                      rows="7">{{@$product->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="float-end">
                            <a href="{{route('products.index')}}" class="btn btn-secondary rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn-style rounded-pill"><i
                                    class="{{@$product ? 'fa fa-clock-o' : 'fa fa-plus'}} me-2"></i>{{@$product ? 'Update' : 'Add' }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
    <!-- Section End Here -->
@endsection
