@extends('layouts.website')
@section('content')
    <style>
        .description {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .title {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
    <section class="pink-background">
        <div class="row">
            <div class="col-md-4">
            <div class="fs-2 text-center py-5">Opening Time: {{date('h:i A', strtotime($shop->opening_time))}}</div>
            </div>
            <div class="col-md-4">
            <div class="fs-2 text-center py-5">{{$shop->name}}</div>
            </div>
            <div class="col-md-4">
            <div class="fs-2 text-center py-5">Closing Time: {{date('h:i A', strtotime($shop->closing_time))}}</div>
            </div>
            <div class="col-md-12 py-3">
                @if(auth()->user())
               <div class="text-center fs-2">Your Current Balance is: <span class="text-light">$ {{auth()->user()->balance}}</span></div>
                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <section>
                <div class="container">
                    <h2 class="h1 text-center fw-bold mb-4 mt-5">Shop Menu</h2>
                    <div class="row justify-content-center py-5">
                        @foreach($shop->products as $product)
                        <div class="col-md-4 col-xs-12 col-sm-6">
                            <div class="card  mt-5" style="">
                                <img src="{{$product->image}}" height="200px" width="200px" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title title">{{$product->title}}</h5>
                                    <p class="card-text description">{{$product->description}}</p>
                                    {{-- <form action="{{route('order_now')}}" method="post"> --}}
                                        @csrf
                                        <div class="row py-3">
                                            <div class="col-5">
                                                <div class="text-right">Price: $ {{$product->price}}</div>
                                            </div>
                                            <div class="col-7">
                                                <div>
                                                    {{-- <input type="hidden" name="product_id" value="{{$product->id}}"> --}}
                                                    {{-- <input type="hidden" name="shop_id" value="{{$shop->id}}"> --}}
                                                    {{-- Quantity: <input type="number" id="quantity" name="quantity" value="1" style="width: 50px" min="1"> --}}
                                                </div>
                                            </div>
                                        </div>
                                    <button shop_id="{{$shop->id}}" product_id="{{$product->id}}" product_name="{{$product->title}}" product_price="{{$product->price}}" onclick="buyProduct(this);" type="button" class="btn btn-primary w-100">Buy Now</button>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                 </div>
            </section>
        </div>
    </section>

    <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('order_now')}}" method="post">

        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel"><span id="product_name"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                @csrf
                <input type="hidden" name="shop_id" id="shop_id">
                <input type="hidden" name="product_id" id="product_id">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center"><strong class="float-right">Price $<span id="product_price"></span></strong></p>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Enter Quantity</span>
                                <input type="number" min="1" name="quantity" value="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                              </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Comments (Optional)</label>
                              </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Place Order Now</button>
        </div>
    </form>

      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

        function buyProduct(e) {
            $('#product_id').val($(e).attr('product_id'))
            $('#shop_id').val($(e).attr('shop_id'))
            $('#product_name').text($(e).attr('product_name'))
            $('#product_price').text($(e).attr('product_price'))
            $('#exampleModal').modal('show')
        }
    </script>
@endsection
