@extends('layouts.manager')
@section('content')
    <div class="col-md-9">
        <form action="{{ route('shoptime.update',[@$shop->id])}}"
              method="post">
            @csrf
            @if(@$shop)
                @method('put')
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="opening_time">Opening Time</label>
                        <input type="time" id="title" value="{{@$shop->opening_time}}" name="opening_time"
                               class="form-control @error('opening_time') is-invalid @enderror">
                        @error('opening_time')
                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="closing_time">Closing Time</label>
                        <input type="time" value="{{@$shop->closing_time}}" id="closing_time"
                               name="closing_time" class="form-control @error('closing_time') is-invalid @enderror">
                        @error('closing_time')
                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="float-end">
                    <a href="{{route('shoptime.index')}}" class="btn btn-secondary rounded-pill">Cancel</a>
                    <button type="submit" class="btn-style rounded-pill"><i
                            class="{{@$shop ? 'fa fa-clock-o' : 'fa fa-plus'}} me-2"></i>{{@$shop ? 'Update' : 'Add' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
