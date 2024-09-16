<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
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

        <main class="d-flex">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height:92.3vh; height: auto;">
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="{{ route('home') }}" wire:navigate class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <img src="{{ asset('svg/home.svg') }}" alt="">
                        Home
                    </a>
                  </li>
                  @if (Auth::user()->role == 'kasir')    
                  <li>
                    <a href="{{ route('transaksi') }}" wire:navigate class="nav-link {{ request()->routeIs('transaksi') ? 'active' : '' }}">
                        <img src="{{ asset('svg/bag.svg') }}" alt="">
                        Transaksi
                    </a>
                  </li>
                  @endif
                  <li>
                    <a href="{{ route('produk') }}" wire:navigate class="nav-link {{ request()->routeIs('produk') ? 'active' : '' }}">
                        <img src="{{ asset('svg/box.svg') }}" alt="">
                        Produk
                    </a>
                  </li>
                  @if (Auth::user()->role == 'admin')    
                  <li>
                    <a href="{{ route('petugas') }}" wire:navigate class="nav-link {{ request()->routeIs('petugas') ? 'active' : '' }}">
                        <img src="{{ asset('svg/usersolo.svg') }}" alt="">
                        Petugas
                    </a>
                  </li>
                  @endif
                  <li>
                    <a href="{{ route('member') }}" wire:navigate class="nav-link {{ request()->routeIs('member') ? 'active' : '' }}">
                        <img src="{{ asset('svg/groupuser.svg') }}" alt="">    
                        Member
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('laporan') }}" wire:navigate class="nav-link {{ request()->routeIs('laporan') ? 'active' : '' }}">
                        <img src="{{ asset('svg/fileicon.svg') }}" alt="">    
                        Laporan
                    </a>
                  </li>
                </ul>
            </div>
                {{ $slot }}
        </main>
    </div>
</body>
</html>
