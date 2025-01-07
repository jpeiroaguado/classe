<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="{{ route('inicio') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-primary text-decoration-none">
            <span class="fs-3"><i class="bi bi-images"></i> PhotoDay</span>
        </a>
        <ul class="nav nav-pills">
            <!-- Siempre disponible -->
            <li class="nav-item"><a href="{{ route('inicio') }}" class="nav-link {{ setActive('inicio') }}">Inicio</a></li>

            <!-- Solo para usuarios no autenticados -->
            @guest
                <li class="nav-item"><a href="{{ route('registrarse') }}" class="nav-link {{ setActive('registrarse') }}">Registrarse</a></li>
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link {{ setActive('login') }}">Login</a></li>
            @endguest

            <!-- Solo para usuarios autenticados -->
            @auth
                <li class="nav-item"><a href="{{ route('photodays.index') }}" class="nav-link {{ setActive('photodays.index') }}">Mis Fotos</a></li>
                <li class="nav-item"><a href="{{ route('usuarios.index') }}" class="nav-link {{ setActive('usuarios.index') }}">Usuarios</a></li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link text-danger p-0">Cerrar Sesión</button>
                    </form>
                </li>
            @endauth
        </ul>
    </header>
</div>
