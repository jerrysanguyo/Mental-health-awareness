<!-- <nav class="navbar navbar-expand-md fixed-bottom">
    <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Well beign assessment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mind your well-beign</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Freedom wall!!!</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Interactive games
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a class="dropdown-item" href="https://mindyourmind.ca/apps/PanicAttack/panic_html5.html" target="_blank">
                                Anatomy of panic attack (anxiety)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="https://mindyourmind.ca/apps/squishem_2023/index.html" target="_blank">
                                Squish ‘Em (stress)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="https://mindyourmind.ca/apps/StressMeLess/index.html" target="_blank">
                                Stress me less (stress)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="https://mindyourmind.ca/apps/Monstressity/index.html" target="_blank">
                                MonSTRESSity (stress and anxiety)
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> -->

<!-- <nav class="nav nav-pills nav-fill">
    <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
    <a class="nav-link" href="#">Well beign assessment</a>
    <a class="nav-link" href="#">Mind your well-beign</a>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Interactive games
        </a>
        <ul class="dropdown-menu">
            <li class="nav-item">
                <a class="dropdown-item" href="https://mindyourmind.ca/apps/PanicAttack/panic_html5.html" target="_blank">
                    Anatomy of panic attack (anxiety)
                </a>
            </li>
            <li class="nav-item">
                <a class="dropdown-item" href="https://mindyourmind.ca/apps/squishem_2023/index.html" target="_blank">
                    Squish ‘Em (stress)
                </a>
            </li>
            <li class="nav-item">
                <a class="dropdown-item" href="https://mindyourmind.ca/apps/StressMeLess/index.html" target="_blank">
                    Stress me less (stress)
                </a>
            </li>
            <li class="nav-item">
                <a class="dropdown-item" href="https://mindyourmind.ca/apps/Monstressity/index.html" target="_blank">
                    MonSTRESSity (stress and anxiety)
                </a>
            </li>
        </ul>
    </li>
    <a class="nav-link" aria-disabled="true">Freedom wall!!</a>
</nav> -->

<nav class="navbar navbar-expand-lg fixed-bottom custom-navbar">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="{{route('welcome')}}">Home</a> -->
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-pills nav-fill w-100">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ auth()->check() ? route($userRole . '.dashboard') : route('login') }}">
                        Well-being assessment
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mind your well-being</a>
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
                    <a class="nav-link" aria-disabled="true">Freedom wall!!</a>
                </li>
            </ul>
        </div>
    </div>
</nav>