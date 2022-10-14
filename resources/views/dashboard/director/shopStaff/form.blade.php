@extends('layouts.website')
@section('content')
    <div class="container" style="padding-bottom: 250px;">
        <div class="h1  text-info text-center">{{@$shopstaff? 'Edit ShopStaff' : 'Add ShopStaff'}}</div>
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fs-3 fade show mt-3" role="alert">
            <strong>Error!</strong> {{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{@$shopstaff ? route('shopstaff.update',[@$shopstaff->id]) : route('shopstaff.store')}}"
              method="post">
            @csrf
            @if(@$shopstaff)
                @method('put')
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group fs-3">
                        <label for="shop">Select Shop</label>
                        <select class="form-select fs-3 @error('shop_id') is-invalid @enderror" id="shop" name="shop_id">
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
                    <div class="form-group fs-3 mt-4">
                        <label for="staff">Select Staff</label>
                        <select class="form-select fs-3 @error('user_id') is-invalid @enderror" id="staff" name="user_id">
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
            <div class="col-12 text-center mt-3">
                    <a href="{{route('shopstaff.index')}}" class="btn btn-danger fs-3">Cancel</a>
                    <button type="submit" class="btn btn-primary fs-3"><i
                            class="{{@$shopstaff ? 'fa fa-clock-o' : 'fa fa-plus'}} me-2"></i>{{@$shopstaff ? 'Update' : 'Add' }}
                    </button>
            </div>
        </form>
    </div>
@endsection
