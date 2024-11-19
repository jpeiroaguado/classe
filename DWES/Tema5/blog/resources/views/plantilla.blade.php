<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Inici</title>
</head>
<body>
    @include('partials.nav')

    <h1>@yield('titulo_principal')</h1>
    @yield('contenido')
</body>
</html>
