<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('website/images/logo.png')}}" type="image/x-icon">
    <title>Collage canteen</title>
    <link rel="stylesheet" href="{{asset('website/reset.css')}}">
    <link rel="stylesheet" href="{{asset('website/globalStyles.css')}}">
    <link rel="stylesheet" href="{{asset('website/components.css')}}">
    <!-- aos library css  -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Add your custom css -->
    <link rel="stylesheet" href="{{asset('website/home.css')}}">
    <style>
        .button {
            position: relative;
            background-color: #65a765;
            border: none;
            font-size: 12px;
            color: #FFFFFF;
            padding: 10px;
            width: 150px;
            text-align: center;
            transition-duration: 0.4s;
            text-decoration: none;
            overflow: hidden;
            cursor: pointer;
        }

        .button:after {
            content: "";
            background: #f1f1f1;
            display: block;
            position: absolute;
            padding-top: 30%;
            padding-left: 35%;
            margin-left: -20px !important;
            margin-top: -120%;
            opacity: 0;
            transition: all 0.8s
        }

        .button:active:after {
            padding: 0;
            margin: 0;
            opacity: 1;
            transition: 0s
        }
    </style>
</head>

<body>
@include('website.include.header')
@yield('content')
@include('website.include.footer')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<!-- custom script -->
<script src="{{asset('website/main.js')}}"></script>
</body>
</html>
