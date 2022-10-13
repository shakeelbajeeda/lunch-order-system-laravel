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
                                Create New Shop
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="h1  text-info text-center">{{@$shop? 'Edit Shop' : 'Add Shop'}}</div>
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="post" action="{{@$shop? route('shop.update',[@$shop->id]): route('shop.store') }}" class="my-5" enctype="multipart/form-data">
            @csrf
            @if(@$shop)
                @method('put')
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mt-4">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{@$shop? @$shop->name : old('name') }}" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input type="text" name="owner" class="form-control @error('owner') is-invalid @enderror"
                               value="{{@$shop ? @$shop->owner : old('owner') }}" placeholder="Owner">
                        @error('owner')
                        <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{route('shop.index')}}" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="add" class="px-5 btn btn-primary float-right"> <i
                                class="fa fa-plus"></i>
                            {{@$shop? 'Update' : 'Add'}}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
