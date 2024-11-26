<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-3">Blog</span>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ route('inicio') }}" class="nav-link {{setActive('inicio')}}">Inicio</a></li>
        <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link {{setActive('posts.*')}}">Posts</a></li </ul>
</header>
