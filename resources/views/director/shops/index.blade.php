@extends('layouts.director')
@section('content')
    <div class="col-md-9">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Shop</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shops as $shop)
                    <tr>
                        <td class="align-middle">{{$shop->name}}</td>
                        <td class="align-middle">{{$shop->owner}}</td>
                        <td class="align-middle">
                            <a href="{{route('shops.edit', [$shop->id])}}"><i class="fa fa-edit fs-4"></i></a>
                            <a href="{{route('shops_destroy', [$shop->id])}}"><i class="fa fa-trash text-danger fs-4"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
