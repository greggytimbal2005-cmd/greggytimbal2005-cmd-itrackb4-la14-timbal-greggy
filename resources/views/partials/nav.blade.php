<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid px-4">

        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Movie Database</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                       href="{{ url('/') }}">Home</a>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                           href="{{ route('login') }}">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

               @auth
                    <li class="nav-item">
                        <span class="navbar-text px-2">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Log out</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>

    </div>
</nav>