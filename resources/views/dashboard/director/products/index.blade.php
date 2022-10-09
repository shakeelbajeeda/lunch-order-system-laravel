@extends('layouts.dashboard')
@section('content')
    <style>
        .table-responsive1 {
            width: 100%;
            margin-bottom: 15px;
            overflow-x: auto;
            /* overflow-y: hidden; */
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #DDD;
        }

        .w_50 {
            width: 50px;
        }

        .w_100 {
            width: 100px;
        }

        .w_150 {
            width: 150px;
        }

        .w_250 {
            width: 250px;
        }

        .w_200 {
            width: 200px;
        }

        .w_120 {
            width: 120px;
        }
    </style>
    <div class="container">
        <div class="my-3">
            <a href="{{route('product.create')}}" class="btn btn-primary">Add New Product</a>
        </div>
        <div class="table-responsive">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th >Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><img src="{{asset('storage') . '/'.$product->image}}" alt="product" height="100px" width="100px"></td>
                        <td class="align-middle">{{ $product->title }}</td>
                        <td class="align-middle">$ {{ $product->price }}</td>
                        <td class="align-middle">{{ $product->description }}</td>
                        <td class="row overflow-auto w_120">
                            <form method="POST" class="mt-4" action="{{ route('product.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                            <a class="ml-3 btn btn-info mt-4" style="height: 40px"
                               href="{{ route('product.edit', $product->id) }}"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><br>
    <script>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        @if (session()->has('message'))
        toastMixin.fire({
            animation: true,
            title: '{{ session()->get('message') }}'
        });
        @endif
        @if (session()->has('error'))
        toastMixin.fire({
            animation: true,
            icon: 'error',
            title: '{{ session()->get('error') }}'
        });
        @endif
    </script>
@endsection
