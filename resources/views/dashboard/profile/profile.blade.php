@extends('layouts.dashboard')
@section('content')
    <style>
        .padding {
            padding: 3rem !important
        }

        .user-card-full {
            overflow: hidden;
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
            box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
            border: none;
            margin-bottom: 30px;
        }

        .m-r-0 {
            margin-right: 0px;
        }

        .m-l-0 {
            margin-left: 0px;
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px;
        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
            background: linear-gradient(to right, #ee5a6f, #f29263);
        }

        .user-profile {
            padding: 20px 0;
        }

        .card-block {
            padding: 1.25rem;
        }

        .m-b-25 {
            margin-bottom: 25px;
        }

        .img-radius {
            border-radius: 5px;
        }



        h6 {
            font-size: 14px;
        }

        .card .card-block p {
            line-height: 25px;
        }

        @media only screen and (min-width: 1400px){
            p {
                font-size: 14px;
            }
        }

        .card-block {
            padding: 1.25rem;
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .card .card-block p {
            line-height: 25px;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        . {
            color: #919aa3 !important;
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }

        .f-w-600 {
            font-weight: 600;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .p-b-5 {
            padding-bottom: 5px !important;
        }

        .m-b-10 {
            margin-bottom: 10px;
        }

        .m-t-40 {
            margin-top: 20px;
        }

        .user-card-full .social-link li {
            display: inline-block;
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }



    </style>
    <div class="page-content page-container" id="page-content">
        <div class="text-center h1 text-success"> My Profile</div>
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-8 col-md-12">
                    <div class="card user-card-full bg-success text-white">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h3 class="m-b-20 p-b-5 b-b-default f-w-600 ">Information</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="m-b-10 f-w-600 mt-2">Name</h5>
                                            <h6 class=" f-w-400">{{ auth()->user()->name }}</h6>
                                        </div>
                                        <div class="col-sm-12">
                                            <h5 class="m-b-10 f-w-600 mt-2">User Type</h5>
                                            <h6 class=" f-w-400">{{ ucwords(str_replace('_', ' ', auth()->user()->user_type)) }}</h6>
                                        </div>
                                        <div class="col-sm-12">
                                            <h5 class="m-b-10 f-w-600 ">Email</h5>
                                            <h6 class=" f-w-400">{{ auth()->user()->email }}</h6>
                                        </div>
                                        <div class="col-sm-12">
                                            <h5 class="m-b-10 f-w-600 ">Status</h5>
                                            <span class="badge {{ auth()->user()->is_active ? 'badge-primary' : 'badge-danger' }}">
                                                {{ auth()->user()->is_active == 1 ? 'Activated' : 'Inactivated' }}
                                            </span>
                                        </div>
                                        <div class="col-sm-12 pt-2">
                                            <h5 class="m-b-10 f-w-600 ">Address</h5>
                                            <h6 class=" f-w-400">{{ auth()->user()->address }}</h6>
                                        </div>
                                        <div class="col-sm-12 pt-2">
                                            <h5 class="m-b-10 f-w-600 ">Zone</h5>
                                            <h6 class=" f-w-400">{{ auth()->user()->zone }}</h6>
                                        </div>
                                        <div class="col-sm-12 pt-2">
                                            <h3 class="m-b-10 f-w-600 ">Account Balance</h3>
                                            <h4 class="f-w-400  text-light">
                                                ${{ auth()->user()->balance }}
                                            </h4>
                                        </div>
                                    </div>
                                    <h3 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600 ">Actions</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a class="btn btn-outline-primary btn-block" href="{{ url('/update-profile') }}">Edit Profile</a>
                                        </div>
                                        @if(auth()->user()->user_type == 'buyer')
                                            <div class="col-sm-6">
                                                <a class="btn btn-outline-primary btn-block" href="{{ url('/deposit-fund') }}">Deposit Fund</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        @if (session()->has('message'))
        Swal.fire(
            'Good job!',
            '{{ session()->get('message') }}',
            'success'
        )
        @endif
        @if (session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `{{ session()->get('error') }}`,
        })
        @endif
    </script>
@endsection
