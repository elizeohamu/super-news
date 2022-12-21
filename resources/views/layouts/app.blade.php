<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SuperNews') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="header-super">
            <div class="container">
            @guest <a href="{{ url('/') }}"><img src="{{ asset('imgs/marca_news.png') }}" /></a> @endguest
            @auth  <a href="{{ url('/home') }}"><img src="{{ asset('imgs/marca_news.png') }}" /></a> @endauth
                <div class="collapse navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        </div>
        @auth 
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">               
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"> 
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('news') }}">{{ __('Notícias') }}</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('articles') }}">{{ __('Artigos') }}</a>
                            </li>  
                        @role('writer') 
                            <li class="nav-item">
                                <p class="nav-text">Editar:</p>
                            </li>  
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('categoria') }}">{{ __('Categoria') }}</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('noticia') }}">{{ __('Notícia') }}</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('artigo') }}">{{ __('Artigo') }}</a>
                            </li>
                        @endrole
                        @role('admin')                   
                            <li class="nav-item">
                                <p class="nav-text">Editar:</p>
                            </li>  
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('categoria') }}">{{ __('Categoria') }}</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('noticia') }}">{{ __('Notícia') }}</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('artigo') }}">{{ __('Artigo') }}</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('banner') }}">{{ __('Banner') }}</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('anuncio') }}">{{ __('Anuncio') }}</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('users') }}">{{ __('Usuários') }}</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('roles') }}">{{ __('Papéis') }}</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ route('permissions') }}">{{ __('Permissões') }}</a>
                            </li>
                        @endrole  
                        

                    </ul>
                    
                </div>
            </div>
        </nav>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <div class="footer">
                <div class="container">
                    @guest <a href="{{ url('/') }}"><img src="{{ asset('imgs/marca_news.png') }}" /></a> @endguest
                    @auth  <a href="{{ url('/home') }}"><img src="{{ asset('imgs/marca_news.png') }}" /></a> @endauth
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
