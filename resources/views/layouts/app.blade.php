<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/manifest.json">
    <meta name="msapplication-TileColor" content="#009988">
    <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#009988">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}@yield('title')</title>


    <!-- Fonts -->
    {{--
    <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> @yield('styles') {{--
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        --}} {{-- crossorigin="anonymous"> --}}


</head>
<header>
    <nav class="navbar navbar-laravel navbar-expand-md fixed-top text-uppercase shadow">
        {{--
        <nav class="navbar navbar-dark navbar-expand-md fixed-top text-uppercase "> --}}

            <a class="navbar-brand " href="{{ url('/') }}">
                        <img src="{{ asset('img/favicon-32x32.png') }}" class="img-fluid logo" alt="CuponStore">
                        {{ config('app.name', 'Laravel') }}
                    </a>

            <button class="navbar-toggler shadow text-primary border-primary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        {{-- <span class="navbar-toggler-icon"></span> --}}
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto small">
					@if (Auth::check() && Auth::user()->isAdmin() )
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('categorias') }}">Categorías</a>
                    </li>
					<li class="nav-item ">
                        <a class="nav-link  {{active('marcas')}}" href="{{ route('brands') }}">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{active('empresas')}}" href="{{ route('companies.index') }}">Empresas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{active('productos')}}" href="{{ route('products.index') }}">Productos</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link  {{active('personas')}}" href="{{ route('persons') }}">Usuarios</a>
                    </li>
					@endif
					@if (Auth::check() && Auth::user()->isPublicista())
                    <li class="nav-item ">
                        <a class="nav-link " href="{{ route('categorias') }}">Categorías</a>
                    </li>
					<li class="nav-item ">
                        <a class="nav-link  {{active('marcas')}}" href="{{ route('brands') }}">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{active('empresas')}}" href="{{ route('companies.index') }}">Empresas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{active('productos')}}" href="{{ route('products.index') }}">Productos</a>
                    </li>
					@endif
					@if (Auth::check() && Auth::user()->isEmpresario())
					<li class="nav-item">
                        <a class="nav-link  {{active('productos')}}" href="{{route('persons.create')}}">Registrar Cajero</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link  {{active('productos')}}" href="/empresa">Redimir</a>
                    </li>
					@endif
					@if (Auth::check() && Auth::user()->isChecker())
					<li class="nav-item">
                        <a class="nav-link  {{active('productos')}}" href="/empresa">Redimir</a>
                    </li>
					@endif
                </ul>

                {{--
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> --}}
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link rounded rounded-circle" href="{{ route('cart.show') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif @else
                    <li class="nav-item">
                        <strong class="nav-link">{{ Auth::user()->person->role->name }}</strong>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                        <i class="fa fa-user-circle"></i>
                                    {{ Auth::user()->person->first_name }} <span class="caret"></span>
                                </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>

        </nav>
</header>

<body>
    <div id="app">
        {{--
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-fixed"> --}}


            <main class="py-5">

                @yield('content')
            </main>
    </div>
    <!-- Scripts -->


    <script src="{{ asset('js/app.js') }}"></script>
    @include('partials.session-messages') @yield('scripts')
</body>

</html>