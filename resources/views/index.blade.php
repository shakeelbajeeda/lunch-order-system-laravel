@extends('layouts.app')
@section('content')
    <!-- Slideshow with video background begin-->
    <div class="container-fluid slideshow">
        <div class="video-background">
            <video autoplay muted loop>
                <source src="video/windsource.mp4" type="video/mp4">
            </video>
            <div class="slide-content">
                <h1>Tassie Green Energy Trading Company (TaGET)</h1>
                <p>Tasmanias trusted energy trading company</p>
                <div class="card bg-white p-3">
                    <form class="form-inline my-2 my-lg-0" action="{{ route('trading') }}" method="get">
                        <input class="form-control mr-sm-2 col-md-8" type="text" name="search" placeholder="Search by type or zone"
                               aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0 col-md-3" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Slideshow with video background end-->
    <!--about section start -->
    <div class="about_section layout_padding">
        <div class="container">
            <h1 class="text">Our Work</h1>
            <div class="about_section_2">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="about_taital_main">

                            <p class="lorem_text"> Solar panels installed on a farm in Tasmania, Australia.
                                An important part of our work is building knowledge that can be shared openly to help
                                people navigate the energy transition better.
                                We are committed to long-term sustainability.Get a solar fit in no time and without
                                risk. We believe that maximizing the use of sustainable energy will be of great help in
                                the times to come.
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="about_image">
                            <img src="image/wind-energy.jpeg">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="about_section layout_padding">
        <div class="container">
            <h1 class="text">Our Work</h1>
            <div class="about_section_2">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="about_image">
                            <img src="image/solar-panel.jpeg">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="about_taital_main">

                            <p class="lorem_text"> TaGET is one of the world's leading wind turbine trading company with
                                over 30,000 installed units producing wind power worldwide. Our wind energy solutions
                                portfolio includes a range of onshore and offshore turbines with flexible support
                                services.
                                Need help with financing your wind power solution? Always wanting to take advantage of
                                the best new wind power technology? We know wind turbine blades. Capturing the wind at
                                any speed around the world on land or at sea requires the reliability of wind turbine
                                blades.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end -->
    <!--about section end -->
    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital">How We Do</h1>
            <p class="about_text">We provides you the best experience to provide and sell different renewable energy
                solor and wind.</p>
            <div class="services_section_2">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon_box">
                            <div class="icon_1"><img src="images/icon-1.png"></div>
                        </div>
                        <h4 class="selection_text">Site Visit</h4>
                        <p class="ipsum_text"></p>
                        <div class="icon_box">
                            <div class="icon_1"><img src="images/icon-4.png"></div>
                        </div>
                        <h4 class="selection_text">Project Report</h4>
                        <p class="ipsum_text"></p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon_box">
                            <div class="icon_1"><img class="img" src="images/icon-2.png"></div>
                        </div>
                        <h4 class="selection_text">Research and Analytics</h4>
                        <p class="ipsum_text"></p>
                        <div class="icon_box">
                            <div class="icon_1"><img src="images/icon-5.png"></div>
                        </div>
                        <h4 class="selection_text">Advisory Activities</h4>
                        <p class="ipsum_text"></p>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon_box">
                            <div class="icon_1"><img src="images/icon-3.png"></div>
                        </div>
                        <h4 class="selection_text">Designing</h4>
                        <p class="ipsum_text"></p>
                        <div class="icon_box">
                            <div class="icon_1"><img src="images/icon-6.png"></div>
                        </div>
                        <h4 class="selection_text">Execute Project</h4>
                        <p class="ipsum_text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services section end -->
@endsection
