<!doctype html>
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

    <!-- datatable -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('image/IT.webp') }}" type="image/x-icon">

    <!-- facebook sdk -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/page.css'])
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-lg mt-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('main.page') }}">
                Mind your well-being at work
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('main.page') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ auth()->check() ? route($userRole . '.dashboard') : route('login') }}">Well-being assessment</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="interactiveGamesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Interactive games
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="interactiveGamesDropdown">
                            <li><a class="dropdown-item" href="https://mindyourmind.ca/apps/PanicAttack/panic_html5.html" target="_blank">Anatomy of panic attack (anxiety)</a></li>
                            <li><a class="dropdown-item" href="https://mindyourmind.ca/apps/squishem_2023/index.html" target="_blank">Squish ‘Em (stress)</a></li>
                            <li><a class="dropdown-item" href="https://mindyourmind.ca/apps/StressMeLess/index.html" target="_blank">Stress me less (stress)</a></li>
                            <li><a class="dropdown-item" href="https://mindyourmind.ca/apps/Monstressity/index.html" target="_blank">MonSTRESSity (stress and anxiety)</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('freedomwall.index') }}">Freedom wall!!!</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
