@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">{{@$shop? 'Edit Shop' : 'Add Shop'}}</div>
        <form method="post" action="{{@$shop? route('shop.update',[@$shop->id]): route('shop.store') }}" class="my-5" enctype="multipart/form-data">
            @csrf
            @if(@$shop)
                @method('put')
            @endif
            <div class="row">
                <div class="col-md-4 mt-4">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{@$shop? @$shop->name : old('name') }}" placeholder="Name">
                    @error('name')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="text" name="owner" class="form-control @error('owner') is-invalid @enderror"
                           value="{{@$shop ? @$shop->owner : old('owner') }}" placeholder="Owner">
                    @error('owner')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 text-center mt-4">
                    <button type="submit" name="add" class="px-5 fs-2 btn btn-primary float-right"> <i
                            class="fa fa-plus"></i>
                        {{@$shop? 'Update' : 'Add'}}
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
