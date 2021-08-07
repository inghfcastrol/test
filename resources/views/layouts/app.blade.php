<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Project Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown_configuracion" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Configuración</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_configuracion">
                                <a class="dropdown-item" href="{{ url('/config/estados') }}">estados</a>
                                <a class="dropdown-item" href="{{ url('/config/entidades') }}">entidades</a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown_ubicacion" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Ubicación</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_ubicacion">
                                <a class="dropdown-item" href="{{ url('/ubicacion/continentes') }}">continentes *</a>
                                <a class="dropdown-item" href="{{ url('/ubicacion/paises') }}">países *</a>
                                <a class="dropdown-item" href="{{ url('/ubicacion/departamentos') }}">departamentos *</a>
                                <a class="dropdown-item" href="{{ url('/ubicacion/ciudades') }}">ciudades *</a>
                                <a class="dropdown-item" href="{{ url('/ubicacion/zipcodes') }}">zipcodes *</a>
                                <a class="dropdown-item" href="{{ url('/ubicacion/ubicaciones') }}">ubicaciones *</a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown_dispositivos" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Dispositivos</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_dispositivos">
                                <a class="dropdown-item" href="{{ url('/dispositivos/plataformas') }}">plataformas *</a>
                                <a class="dropdown-item" href="{{ url('/dispositivos/dispositivos') }}">dispositivos *</a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown_usuarios" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Usuarios</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_usuarios">
                                <a class="dropdown-item" href="{{ url('/usuarios/tiposidentificaciones') }}">tipos de identificaciones *</a>
                                <a class="dropdown-item" href="{{ url('/usuarios/generos') }}">géneros *</a>
                                <a class="dropdown-item" href="{{ url('/usuarios/roles') }}">roles *</a>
                                <a class="dropdown-item" href="{{ url('/usuarios/usuarios') }}">usuarios *</a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown_otros" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Otros</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_otros">
                                <a class="dropdown-item" href="{{ url('/otros/divisas') }}">divisas *</a>
                                <a class="dropdown-item" href="{{ url('/otros/idiomas') }}">idiomas *</a>
                            </div>
                        </li>
                    </ul>
                    
                    @else
                    
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="float: right;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingreso') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.3.1.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-mask.min.js') }}" defer></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}" defer></script>

    <!-- Project Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/validations.js') }}" defer></script>
    <script src="{{ asset('js/efectos.js') }}" defer></script>
    
</body>
</html>
