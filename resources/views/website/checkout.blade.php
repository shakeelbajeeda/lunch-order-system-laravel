@extends('layouts.website')
@section('content')
    <style>
        .payment-form{
            padding-bottom: 50px;
            font-family: 'Montserrat', sans-serif;
        }

        .payment-form.dark{
            background-color: #f6f6f6;
        }

        .payment-form .content{
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
            background-color: white;
        }

        .payment-form .block-heading{
            padding-top: 50px;
            margin-bottom: 40px;
            text-align: center;
        }

        .payment-form .block-heading p{
            text-align: center;
            max-width: 420px;
            margin: auto;
            opacity:0.7;
        }

        .payment-form.dark .block-heading p{
            opacity:0.8;
        }

        .payment-form .block-heading h1,
        .payment-form .block-heading h2,
        .payment-form .block-heading h3 {
            margin-bottom:1.2rem;
            color: #3b99e0;
        }

        .payment-form form{
            border-top: 2px solid #5ea4f3;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
            background-color: #ffffff;
            padding: 0;
            max-width: 600px;
            margin: auto;
        }

        .payment-form .title{
            font-size: 1em;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            margin-bottom: 0.8em;
            font-weight: 600;
            padding-bottom: 8px;
        }

        .payment-form .products{
            background-color: #f7fbff;
            padding: 25px;
        }

        .payment-form .products .item{
            margin-bottom:1em;
        }

        .payment-form .products .item-name{
            font-weight:600;
            font-size: 0.9em;
        }

        .payment-form .products .item-description{
            font-size:0.8em;
            opacity:0.6;
        }

        .payment-form .products .item p{
            margin-bottom:0.2em;
        }

        .payment-form .products .price{
            float: right;
            font-weight: 600;
            font-size: 0.9em;
        }

        .payment-form .products .total{
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            margin-top: 10px;
            padding-top: 19px;
            font-weight: 600;
            line-height: 1;
        }

        .payment-form .card-details{
            padding: 25px 25px 15px;
        }

        .payment-form .card-details label{
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #79818a;
            text-transform: uppercase;
        }

        .payment-form .card-details button{
            margin-top: 0.6em;
            padding:12px 0;
            font-weight: 600;
        }

        .payment-form .date-separator{
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 5px;
        }

        @media (min-width: 576px) {
            .payment-form .title {
                font-size: 1.2em;
            }

            .payment-form .products {
                padding: 40px;
            }

            .payment-form .products .item-name {
                font-size: 1em;
            }

            .payment-form .products .price {
                font-size: 1em;
            }

            .payment-form .card-details {
                padding: 40px 40px 30px;
            }

            .payment-form .card-details button {
                margin-top: 2em;
            }
        }
    </style>
    <div class="header-bg vh-70 d-flex">
        <div class="m-auto">
            <div class="ps-2">
                <h1>UTAS Lunch Order System</h1>
                <p>University of Tasmania Lunch Order System</p>
                <div class="fs-3 mt-5">Your Current Balance is: <span class="text-danger">$ {{auth()->user()->balance == null? '0' : auth()->user()->balance}}</span></div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="pt-2">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{session('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="pt-2">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <main class="page payment-page">
                <section class="payment-form dark">
                    <div class="container">
                        <div class="block-heading">
                            <h2>Payment</h2>
                        </div>
                        <form>
                            <div class="products">
                                <h3 class="title">Checkout</h3>
                                @if(session('cart'))
                                     @foreach(session('cart') as $product)
                                        <div class="item">
                                            <span class="price">$ {{$product['price']*$product['quantity']}}</span>
                                            <p class="item-name">{{$product['title']}}</p>
                                            <p class="item-description">Per Quantity: $ {{$product['price']}}</p>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="total">Total
                                    <span class="price">
                                        @php $total = 0 @endphp
                                        @foreach((array) session('cart') as $id => $product)
                                            @php $total += $product['price'] * $product['quantity'] @endphp
                                        @endforeach
                                       $ {{$total}}
                                    </span>
                                </div>
                                <div class="form-group col-sm-12">
                                    <a href="{{route('orderNow')}}"  type="button" class="btn btn-primary btn-block w-100 mt-3">Proceed</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </main>
        </div>
    </section>
@endsection
