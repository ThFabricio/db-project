<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Avaliaovo</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('opcoes.usuario') }}">Usuário</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('opcoes.granja') }}">Granja</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('opcoes.setor') }}">Setor</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('opcoes.ovo') }}">Ovos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('mostrar.consulta') }}">Consultas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('mostrar.visao') }}">Visões do Banco de Dados</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>
</html>
