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
    <link href="https://fonts.bunny.net/css?family=Nunito|Poppins:wght@300;400;600;700" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/welcome.css'])
</head>
<body>
    <div class="row mt-5">
        <div class="d-flex justify-content-center">
            <img id="logo" src="{{ asset('image/IT.webp') }}" alt="Touch ID Icon">
            <img id="logo" src="{{ asset('image/city.webp') }}" alt="Touch ID Icon">
            <img id="logo" src="{{ asset('image/cho.webp') }}" alt="Touch ID Icon">
        </div>
    </div>
    <div class="container-fluid">
        <div class="responsive-height text-center">
            <h1 id="glow"><strong>MIND YOUR<br>WELL-BEING AT WORK</strong></h1>
            <a href="{{ route('main.page') }}">
                <img src="{{ asset('image/touch_id.webp') }}" alt="Touch ID Icon">
            </a>
        </div>
    </div>
</body>
</html>