@extends('layouts.website')
@section('content')
<section id="main-showcase" class="pink-background">
    <div class="container">
        <div class="row">
            <div class="text-center text-md-left align-self-center col-lg-6">
                <div class="showcase-content">
                    <h1 class="title mb-4 mt-4" style="font-weight:800;font-size:260%">Tasmania University Lunch System</h1>
                    <div class="subtitle mb-4 pink-background-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                            optio, eaque rerum! Provident similique accusantium nemo autem.</p>
                    </div>
                    <a class="btn btn-danger btn-lg mb-4" href="#shop_section">See Our Menu</a>
                </div>
            </div>
            <div class="text-center col-lg-6">
                <div class="d-none d-lg-block showcase-img">
                    <div style="display:inline-block;max-width:100%;overflow:hidden;position:relative;box-sizing:border-box;margin:0">
                        <div class="hero-char-image-1">
                            <img class="hero-char-image-2" alt="" aria-hidden="true" src="{{asset('assets/images/hero-char.webp')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- three box -->
<section class="text-center there-box-background-color">
    <div class="container">
        <h2 class="fw-bold">Shop
            <span class="text-danger fw-bold fs-1">Links</span>
        </h2>
        <div class="mt-5 row justify-content-center" id="shop_section">
            @foreach($shops as $shop)
            <div class="mb-5 col-lg-4">
                <div class="card" style="width: 18rem;height: 10rem">
                    <div class="card-body">
                        <h5 class="card-title py-3">{{$shop->name}}</h5>
                        <a href="{{route('get_shop_products', [$shop->id])}}" class="btn btn-primary">See Products</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
