<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/main.css'])
</head>
<body class="antialiased">

<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-start">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
                <img src="{{ asset('image/title.png') }}" alt="" class="logo">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
                <img src="{{ asset('image/title2.png') }}" alt="" class="logo">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center responsive-height ">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @include('component/welcome/mental2')
            @include('component/welcome/health2')
        </div>
    </div>
    @include('component/welcome/nav')
</div>
    <script>
        function flipCard(card) {
            card.classList.toggle("flipped");
        }
    </script>
</body>
</html>