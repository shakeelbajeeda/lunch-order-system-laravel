@extends('layouts.director')
@section('content')
    <div class="col-md-9">
        <form action="{{@$shopWorker ? route('shopStaff.update',[@$shopWorker->id]) : route('shopStaff.store')}}"
            method="post">
            @csrf
            @if(@$shopWorker)
                @method('put')
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="shop">Select Shop</label>
                        <select class="form-select @error('shop_id') is-invalid @enderror" id="shop" name="shop_id">
                            <option value="{{@$shopWorker? @$shopWorker->shop->id: ''}}" selected hidden>{{@$shopWorker ? @$shopWorker->shop->name : 'Select Shop'}}</option>
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
                        <select class="form-select @error('user_id') is-invalid @enderror" id="staff" name="user_id">
                            <option value="{{@$shopWorker? @$shopWorker->user->id: ''}}" selected hidden>{{@$shopWorker ? @$shopWorker->user->name.' ('.@$shopWorker->user->role. ')' : 'Select Staff'}}</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} <span class="ps-5">{{'('.$user->role.')'}}</span></option>
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
                    <button type="submit" class="btn-style rounded-pill"><i
                            class="{{@$shopWorker ? 'fa fa-clock-o' : 'fa fa-plus'}} me-2"></i>{{@$shopWorker ? 'Update' : 'Add' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
