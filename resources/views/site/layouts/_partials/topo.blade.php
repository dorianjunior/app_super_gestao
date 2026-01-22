<nav class="navbar navbar-expand-lg navbar-site sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('site.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Super Gestão">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('site.index') ? 'active' : '' }}" href="{{ route('site.index') }}">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('site.sobre') ? 'active' : '' }}" href="{{ route('site.sobre') }}">
                        <i class="fas fa-info-circle me-1"></i> Sobre
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('site.contato') ? 'active' : '' }}" href="{{ route('site.contato') }}">
                        <i class="fas fa-envelope me-1"></i> Contato
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-1"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>