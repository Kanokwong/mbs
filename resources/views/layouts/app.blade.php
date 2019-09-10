<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title', 'Home')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <link rel="stylesheet" href="https://unpkg.com/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

<header class="app-header navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa fa-commenting" aria-hidden="true"></i>&nbsp;{{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/mbs"><i class="fa fa-commenting-o" aria-hidden="true"></i> Broadcast Messaging</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/company/member"><i class="fa fa-users" aria-hidden="true"></i> List of Members</a>
                </li>
            </ul>

            <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> {{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fa fa-user" aria-hidden="true"></i> {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
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
</header>

<div class="app-body">
    <main id="app" class="container py-3">
        @yield('content')
    </main>
</div>

<footer class="app-footer" style="margin-left:0;">
    <div>
        <a target="_blank" href="https://github.com/rph-dev/mbs">RPH Linetify</a>
        <span>© 2019 RPH.</span>
    </div>
    <div class="ml-auto">
        <span>Powered by</span>
        <a target="_blank" href="http://rph.co.th">RPH</a>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
@stack('js')
</body>
</html>
