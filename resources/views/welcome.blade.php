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
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/welcome.css'])
</head>
<body class="antialiased">
    <div class="container-fluid">
        <div class="responsive-height d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                    @include('component/welcome/mental2')
                    @include('component/welcome/health2')
            </div>
        </div>
    </div>
    <script>
        function flipCard(card) {
            card.classList.toggle("flipped");
        }
    </script>
</body>
</html>