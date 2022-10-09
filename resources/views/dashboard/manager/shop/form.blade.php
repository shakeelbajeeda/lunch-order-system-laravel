@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">Edit Shop Time</div>
        <form method="post" action="{{ route('update_shop_time',[@$shop->id]) }}" class="my-5" >
            @csrf
            @if(@$shop)
                @method('put')
            @endif
            <div class="row">
                <div class="col-md-4 mt-4">
                    <input type="time" name="opening_time" class="form-control @error('opening_time') is-invalid @enderror"
                           value="{{ @$shop->opening_time }}" placeholder="opening time">
                    @error('opening_time')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mt-4">
                    <input type="time" name="closing_time" class="form-control @error('closing_time') is-invalid @enderror"
                           value="{{ @$shop->closing_time }}" placeholder="Closing Time">
                    @error('closing_time')
                    <span class="invalid-feedback" role="alert" style="display: block !important">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 text-center mt-4">
                    <button type="submit" class="px-5 fs-2 btn btn-primary float-right"> <i
                            class="fa fa-clock-o"></i>
                        Update
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
