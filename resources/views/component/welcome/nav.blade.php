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
                    <a class="nav-link" href="{{ route('well.being') }}">Mind your well-being</a>
                </li>
                <li class="nav-item dropup">
                    <a class="nav-link dropdown-toggle" href="#" id="interactiveGamesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Interactive games
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="interactiveGamesDropdown">
                        <li><a class="dropdown-item" href="https://mindyourmind.ca/apps/PanicAttack/panic_html5.html" target="_blank">Anatomy of panic attack (anxiety)</a></li>
                        <li><a class="dropdown-item" href="https://mindyourmind.ca/apps/squishem_2023/index.html" target="_blank">Squish ‘Em (stress)</a></li>
                        <li><a class="dropdown-item" href="https://mindyourmind.ca/apps/StressMeLess/index.html" target="_blank">Stress me less (stress)</a></li>
                        <li><a class="dropdown-item" href="https://mindyourmind.ca/apps/Monstressity/index.html" target="_blank">MonSTRESSity (stress and anxiety)</a></li>

                        <li><a class="dropdown-item" href="{{ route('game.endless') }}" target="_blank">Endless bike</a></li>
                        <li><a class="dropdown-item" href="{{ route('game.flappy') }}" target="_blank">Floppy Mario</a></li>
                        <li><a class="dropdown-item" href="{{ route('game.tictactoe') }}" target="_blank">Tic Tac Toe</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('freedomwall.index') }}">Freedom wall!!!</a>
                </li>
            </ul>
        </div>
    </div>
</nav>