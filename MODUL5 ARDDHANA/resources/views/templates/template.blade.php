<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <title>@yield('title')</title>

</head>
<body class="vh-100">
<div class="container align-content-center">
    <nav class="navbar navbar-expand navbar-light bg-transparent justify-content-center">
        <a class="navbar-brand" href="home.html"><img alt="" id="logo-nav" src="assets/img/logo-ead.png"></a>
        <ul class="navbar-nav">
            <li class="nav-item @yield('home')">
                <a class="nav-link" href="{{route('home')}}"><strong>HOME</strong></a>
            </li>
            <li class="nav-item @yield('product')">
                <a class="nav-link" href="{{route('show_products')}}"><strong>PRODUCT</strong></a>
            </li>
            <li class="nav-item @yield('order')">
                <a class="nav-link" href="{{route('show_products_to_order')}}"><strong>ORDER</strong></a>
            </li>
            <li class="nav-item @yield('history')">
                <a class="nav-link" href="{{route('show_order_history')}}"><strong>HISTORY</strong></a>
            </li>
        </ul>
    </nav>
    <div class="row justify-content-center d-flex flex-lg-row h-100">
        <div class="col-12">
            @yield('container')
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
</html>
