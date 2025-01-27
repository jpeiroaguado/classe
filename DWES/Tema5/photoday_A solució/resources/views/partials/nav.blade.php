<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-primary text-decoration-none">
        <span class="fs-3"><i class="bi bi-images"></i> PhotoDay </span>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="{{ route('inicio') }}" class="nav-link {{ setActive('inicio') }}">Inicio</a>
        </li>
        @if (auth()->check() && auth()->user()->rol == 'Admin')
            <li class="nav-item">
                <a href="{{ route('usuarios.index') }}" class="nav-link {{ setActive('usuarios.*') }}">Usuarios</a>
            </li>
        @endif
        @if (auth()->check() && auth()->user()->rol != 'Admin')
            <li class="nav-item">
                <a href="{{ route('photodays.index') }}" class="nav-link {{ setActive('photodays.*') }}">PhotoDays</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('photodays.create') }}" class="nav-link" alt="pujar foto"><i
                        class="bi bi-cloud-arrow-up"></i></a>
            </li>
        @endif
        @if (auth()->guest())
            <li class="nav-item">
                <a href="{{ route('registro') }}" class="nav-link {{ setActive('registro') }}">Registrarse</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link {{ setActive('login') }}">Login</a>
            </li>
        @endif
        @if (auth()->check())
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link {{ setActive('logout') }}">Logout</a>
            </li>
        @endif

    </ul>
</header>
