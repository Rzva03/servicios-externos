<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/itvo.ico') }}" sizes="16x16 24x24 36x36 48x48" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div style="background-color:#1B3A6D; width=100%; height=50px">
            <img src="{{ asset('img/logo-itvo.png') }}" alt="TecNM/I.T.V.O.">
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}" id="home">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{ asset('img/itvo.ico') }}" class="navbar__logo" alt="ITVO">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase"
                                        href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- <img src="{{ asset('') }}" alt=""> --}}
                            {{-- instancia --}}
                            @if (Auth::user()->rol == 0)
                                <li class="nav-item dropdown ">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('INSTANCIAS') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('instancia.index') }}">
                                            {{ __('Instancia') }}
                                        </a>
                                    </div>
                                </li>
                                {{-- convenio --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('CONVENIOS') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('convenio.index') }}">
                                            {{ __('Convenio') }}
                                        </a>
                                    </div>
                                </li>
                                {{-- alumno --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('ALUMNOS') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('alumno.index') }}">
                                            {{ __('Alumno') }}
                                        </a>
                                    </div>
                                </li>
                                {{-- proyecto --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('PROYECTOS') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('proyecto.index') }}">
                                            {{ __('Proyecto') }}
                                        </a>
                                    </div>
                                </li>

                                {{-- reportes --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('REPORTES') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('consulta-indicador-sysad.index') }}">
                                            {{ __('Indicadores sysad') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('consulta-indicador.index') }}">
                                            {{ __('Otros Indicadores') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('consulta-proyecto.index') }}">
                                            {{ __('Proyectos') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('consulta-convenio.index') }}">
                                            {{ __('Convenios marcos vigentes') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item"
                                            href="{{ route('consulta-convenio-vigentes.convenioVigenteTodos') }}">
                                            {{ __('Todos los convenios vigentes') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item"
                                            href="{{ route('consulta-convenio-finalizado.convenioVencidoTodos') }}">
                                            {{ __('Todos los convenios vencidos') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item"
                                            href="{{ route('consulta-convenios-trimestre.index') }}">
                                            {{ __('Convenios por trimestre') }}
                                        </a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item dropdown ">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('INSTANCIAS') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('sector.index') }}">
                                            {{ __('Sector') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('tipo-sector.index') }}">
                                            {{ __('Tipo Sector') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('tamanio.index') }}">
                                            {{ __('Tamaño') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('alcance.index') }}">
                                            {{ __('Alcance') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('giro.index') }}">
                                            {{ __('Giro') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('area-conocimiento.index') }}">
                                            {{ __('Área de conocimiento') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('instancia.index') }}">
                                            {{ __('Instancia') }}
                                        </a>
                                    </div>
                                </li>
                                {{-- convenio --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('CONVENIOS') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('tipo-convenio.index') }}">
                                            {{ __('Tipo de convenio') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('indicador-sysad.index') }}">
                                            {{ __('Indicador sysad') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('indicador.index') }}">
                                            {{ __('Otros Indicadores') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('convenio.index') }}">
                                            {{ __('Convenio') }}
                                        </a>
                                    </div>
                                </li>
                                {{-- alumno --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('ALUMNOS') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('carrera.index') }}">
                                            {{ __('Carrera') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('alumno.index') }}">
                                            {{ __('Alumno') }}
                                        </a>
                                    </div>
                                </li>
                                {{-- proyecto --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('PROYECTOS') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('asesor-externo.index') }}">
                                            {{ __('Asesor Externo') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('asesor-interno.index') }}">
                                            {{ __('Asesor Interno') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('periodo.index') }}">
                                            {{ __('Periodo') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('proyecto.index') }}">
                                            {{ __('Proyecto') }}
                                        </a>
                                    </div>
                                </li>

                                {{-- reportes --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('REPORTES') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right text-uppercase"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('consulta-indicador-sysad.index') }}">
                                            {{ __('Indicadores sysad') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('consulta-indicador.index') }}">
                                            {{ __('Otros Indicadores') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('consulta-proyecto.index') }}">
                                            {{ __('Proyectos') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('consulta-convenio.index') }}">
                                            {{ __('Convenios marcos vigentes') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item"
                                            href="{{ route('consulta-convenio-vigentes.convenioVigenteTodos') }}">
                                            {{ __('Todos los convenios vigentes') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item"
                                            href="{{ route('consulta-convenio-finalizado.convenioVencidoTodos') }}">
                                            {{ __('Todos los convenios vencidos') }}
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item"
                                            href="{{ route('consulta-convenios-trimestre.index') }}">
                                            {{ __('Convenios por trimestre') }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                            {{-- logout --}}
                            <li class=" nav-item dropdown text-uppercase">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right text-uppercase"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
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
</body>

</html>
