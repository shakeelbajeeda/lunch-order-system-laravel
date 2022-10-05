@extends('layouts.manager')
@section('content')
    <div class="col-md-9">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Opening Time</th>
                    <th>Closing Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shopTime as $shop)
                    <tr>
                        <td class="align-middle">{{ date('h:i A', strtotime($shop->opening_time)) }}</td>
                        <td class="align-middle">{{date('h:i A', strtotime($shop->closing_time))}}</td>
                        <td class="align-middle">
                            <a href="{{route('shoptime.edit', [$shop->id])}}"><i class="fa fa-edit fs-4"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
