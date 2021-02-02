<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LIVРозница 2.0 (v1.9.3)</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b>LIV</b>Розница 2.0 (v1.9.2)
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @can('is_admin',\App\User::class)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                   href="#"
                                   id="navbarDropdown"
                                   role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    Администратирование
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                       href="{{ route('upaenl.users') }}">Пользователь</a>
                                </div>
                            </li>
                        @endcan
                        @can('is_admin',\App\User::class)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                       href="#"
                                       id="navCompany"
                                       role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true"
                                       aria-expanded="false">
                                        Компания
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navCompany">
                                        <a class="dropdown-item"
                                           href="{{ route('upaenl.point') }}">Торговые точки</a>
                                        <a class="dropdown-item"
                                           href="{{ route('upaenl.pos') }}">Контрагент</a>
                                        <a class="dropdown-item"
                                           href="{{ route('upaenl.ass') }}">Ассортимент</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                       href="#"
                                       id="navCompany"
                                       role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true"
                                       aria-expanded="false">
                                        Документы
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navCompany">
                                        <a class="dropdown-item"
                                           href="{{ route('upaenl.prixod') }}">Приходы</a>
                                        <a class="dropdown-item"
                                           href="{{ route('upaenl.rasxod') }}">Расходы</a>
                                        <!--
                                        <a class="dropdown-item"
                                           href="{{ route('upaenl.zaivka.index') }}">Заявка с сайта</a>
                                           -->
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                       href="#"
                                       id="navCompany"
                                       role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true"
                                       aria-expanded="false">
                                        Отчеты
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navCompany">
                                        <a class="dropdown-item"
                                           href="{{ route('upaenl.report.getostatok') }}">Остаток</a>
                                    </div>
                                </li>
                        @endcan
                        @can('is_kassir',\App\User::class)
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                       href="#"
                                       id="navCompany"
                                       role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true"
                                       aria-expanded="false">
                                        Документы
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navCompany">

                                        <a class="dropdown-item"
                                           href="{{ route('upaenl.rasxod') }}">Расходы</a>
                                    </div>
                            </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Вxод</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('upaenl.profil')}}">
                                       Профиль
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выход
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
