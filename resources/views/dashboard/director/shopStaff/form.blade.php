@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-dark text-center">{{@$shopstaff? 'Edit ShopStaff' : 'Add ShopStaff'}}</div>
        <form action="{{@$shopstaff ? route('shopstaff.update',[@$shopstaff->id]) : route('shopstaff.store')}}"
              method="post">
            @csrf
            @if(@$shopstaff)
                @method('put')
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="shop">Select Shop</label>
                        <select class="form-control @error('shop_id') is-invalid @enderror" id="shop" name="shop_id">
                            <option value="{{@$shopstaff? @$shopstaff->shop->id: ''}}" selected hidden>{{@$shopstaff ? @$shopstaff->shop->name : 'Select Shop'}}</option>
                            @foreach($shops as $shop)
                                <option value="{{$shop->id}}">{{$shop->name}}</option>
                            @endforeach
                        </select>
                        @error('shop_id')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="staff">Select Staff</label>
                        <select class="form-control @error('user_id') is-invalid @enderror" id="staff" name="user_id">
                            <option value="{{@$shopstaff? @$shopstaff->user->id: ''}}" selected hidden>{{@$shopstaff ? @$shopstaff->user->name.' ('.@$shopstaff->user->role. ')' : 'Select Staff'}}</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} <span class="ps-5"> {{'('.$user->role.')'}}</span></option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="float-end">
                    <a href="{{route('shopstaff.index')}}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary"><i
                            class="{{@$shopstaff ? 'fa fa-clock-o' : 'fa fa-plus'}} me-2"></i>{{@$shopstaff ? 'Update' : 'Add' }}
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
