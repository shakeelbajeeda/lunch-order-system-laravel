@extends('layouts.director')
@section('content')
    <div class="col-md-9">
        <form action="{{@$shop ? route('shops.update',[@$shop->id]) : route('shops.store')}}"
              method="post">
            @csrf
            @if(@$shop)
                @method('put')
            @endif
            <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Shop Name</label>
                                <input type="text" id="title" value="{{@$shop->name}}" name="name"
                                       placeholder="Shop Name"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="owner">Owner Name</label>
                                <input type="text" value="{{@$shop->owner}}" placeholder="Owner Name" id="owner"
                                       name="owner" class="form-control @error('owner') is-invalid @enderror">
                                @error('owner')
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
                                class="{{@$shop ? 'fa fa-clock-o' : 'fa fa-plus'}} me-2"></i>{{@$shop ? 'Update' : 'Add' }}
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
