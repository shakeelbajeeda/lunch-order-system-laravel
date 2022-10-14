@extends('layouts.website')
@section('content')
    <!-- Hero Section -->
@foreach($shops as $shop)
    <section id="hero">
        <div class="container">
            <div class="hero__wrapper">
                <div class="hero__left" data-aos="fade-left">
                    <div class="hero__left__wrapper">

                        <h1 class="hero__heading">{{$shop->name}}</h1>
                        <p class="hero__info">
                            We are a multi-cuisine canteen  offering a wide variety of food experience in both casual and fine
                            dining
                            environment.
                        </p>
                        <div class="button__wrapper">
                            <a href="{{route('get_shop_products', [$shop->id])}}" class="btn btn-primary fs-3">Explore Menu</a>
                            <!-- <a href="./shop.html" class="btn">Shop</a> -->
                        </div>
                    </div>
                </div>
                <div class="hero__right" data-aos="fade-right">
                    <div class="hero__imgWrapper">
                        <img src="{{asset('website/images/heroImg.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->
    <!-- Store Info Section -->
    <section id="storeInfo" data-aos="fade-up">
        <div class="container">
            <div class="storeInfo__wrapper">
                <div class="storeInfo__item">
                    <div class="storeInfo__icon">
                        <img src="{{asset('website/images/wall-clock-icon.svg')}}" alt="clock icon">
                    </div>
                    <h3 class="storeInfo__title">
                        {{date('h:i A', strtotime($shop->opening_time))}} -  {{date('h:i A', strtotime($shop->closing_time))}}
                    </h3>
                    <p class="storeInfo__text">
                        Opening Hour
                    </p>
                </div>
                <div class="storeInfo__item">
                    <div class="storeInfo__icon">
                        <img src="{{asset('website/images/address-icon.svg')}}" alt="clock icon">
                    </div>
                    <h3 class="storeInfo__title">
                        Hobart, Tasmania
                    </h3>
                    <p class="storeInfo__text">
                        Australia
                    </p>
                </div>
                <div class="storeInfo__item">
                    <div class="storeInfo__icon">
                        <img src="{{asset('website/images/phone-icon.svg')}}" alt="clock icon">
                    </div>
                    <h3 class="storeInfo__title">
                        0466982621
                    </h3>
                    <p class="storeInfo__text">
                        Call Now
                    </p>
                </div>
            </div>
        </div>
    </section>
@endforeach
    <!-- End Store Info Section -->
@endsection
