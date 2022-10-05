@extends('layouts.website')
@section('content')
    <div class="header-bg vh-70 d-flex">
        <div class="m-auto">
            <div class="ps-2">
                <h1>UTAS Lunch Order System</h1>
                <p>University of Tasmania Lunch Order System</p>
            </div>
        </div>
    </div>
{{--    Cart Section Start here--}}
    <section>
        <div class="container">
            <div class="fs-1 text-center py-3">Manage Cart</div>
            <div class="pt-2">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{session('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                        <th>Product</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(session('cart'))
                      @foreach(session('cart') as $key => $product)
                    <tr data-id="{{$key}}">
                      <td><img src="{{asset('storage'). '/'.$product['image']}}" height="80px" width="80px" alt=""></td>
                      <td class="align-middle">{{$product['title']}}</td>
                      <td class="align-middle"><input type="number" class="update-cart quantity form-control" value="{{$product['quantity']}}" style="width: 70px"></td>
                      <td class="align-middle">$ {{$product['price']* $product['quantity']}}</td>
                      <td class="align-middle"><i class="fa fa-trash text-danger remove_from_cart" style="cursor: pointer"></i></td>
                    </tr>
                      @endforeach
                  @endif
                  </tbody>
                </table>
            </div>
            <div class="my-3">
                <a href="{{url('/checkout')}}" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </section>
    <script type="text/javascript">

        $(".update-cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('updateCart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove_from_cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{route('removeFromCart')}}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection
