<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo_pagina')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

<body>

    <div class="container">
        @include('partials.nav')
        <h1>@yield('titulo')</h1>
        @yield('contenido')
    </div>
</body>

</html>
