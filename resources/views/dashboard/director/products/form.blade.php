@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">{{@$product? 'Edit Product' : 'Add Product'}}</div>
        <form method="post" action="{{@$product? route('product.update',[@$product->id]): route('product.store') }}" class="my-5" enctype="multipart/form-data">
            @csrf
            @if(@$product)
                @method('put')
            @endif
            <div class="row">
                <div class="col-md-4 mt-4">
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{@$product? @$product->title : old('title') }}" placeholder="Title">
                    @error('title')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                           value="{{@$product ? @$product->price : old('price') }}" placeholder="Price">
                    @error('price')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
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
                    <button type="submit" name="add" class="px-5 fs-2 btn btn-primary float-right"> <i
                            class="fa fa-plus"></i>
                        {{@$product? 'Update' : 'Add'}}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        @if (session()->has('error'))
        toastMixin.fire({
            animation: true,
            icon: 'error',
            title: '{{ session()->get('error') }}'
        });
        @endif
    </script>
@endsection
