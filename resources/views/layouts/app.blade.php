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

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animation') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>




    <--====================== Scripts ====================== -->
    <script src="{{ asset("assets/js/vendor/modernizr.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/popper.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/waypoint.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/wow.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/counterup.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/feather.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/sal.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/masonry.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/imageloaded.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/magnify.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/lightbox.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/slick.min.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/easypie.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/text-type.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/jquery.style.swicher.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/js.cookie.js") }}"></script>
    <script src="{{ asset("assets/js/vendor/jquery-one-page-nav.js") }}"></script>
    <!-- Main JS -->
    <script src="{{ asset("assets/js/main.js") }}"></script>

    <!-- App Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</body>
</html>
