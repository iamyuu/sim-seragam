<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | SIM Seragam</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('public/vendor/materialize/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/materialize/icon/icon-material.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    @yield('style')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="app">
        <div class="navbar-fixed">
            <nav class="nav-wrapper cyan">

                <!-- Branding Image -->
                <a href="#" class="brand-logo">SIM Seragam</a>

                <!-- Collapsed Hamburger -->
                <a href="#" data-activates="slide-out" class="button-collapse">
                    <i class="material-icons">menu</i>
                </a>
            </nav>
        </div>

        <div class="row">
            <div class="col s12 m12 l2">
                <ul id="slide-out" class="side-nav fixed">
                    <li class="user-detail sidebar" style="background: url('{{ asset('public/img/background.jpg') }}') no-repeat;">
                        <div class="row" style="margin-bottom: 0;">
                            <div class="col s4 m4 l4 user-detail-img">
                                <img src="{{ asset('public/img/default.jpg') }}" class="circle responsive-img user-detail">
                            </div>
                            <div class="col s8 m8 l8">
                                <a href="#" data-activates="dropdown" class="user profile-name dropdown-button">
                                    {{ Auth::user()->name }}
                                    <i class="material-icons" style="position: relative; top:10px;">
                                        keyboard_arrow_down
                                    </i>
                                </a>
                                <ul id="dropdown" class="dropdown-content">
                                    <li><a href="{{ url('logout') }}">keluar</a></li>
                                </ul>
                                <p class="user">
                                    {{ Auth::user()->admin == 0 ? 'Petugas' : 'Admin' }}
                                </p>
                            </div>
                        </div>
                    </li>
                    <li><a class="waves-effect" href="{{ url('/') }}">Dashboard</a></li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header">Data <i class="material-icons">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                      @if (Auth::user()->admin == 1)
                                        {{-- <li><a href="{{ url('user') }}">User</a></li> --}}
                                      @endif
                                        <li><a href="{{ url('siswa') }}">Siswa</a></li>
                                        <li><a href="{{ url('seragam') }}">Seragam</a></li>
                                        <li><a href="{{ url('ukuran') }}">Ukuran</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a class="waves-effect" href="{{ route('ukuran.create') }}">Pengukuran</a></li>
                    <li><a class="waves-effect" href="{{ route('pemesanan.index') }}">Pemesanan</a></li>
                </ul>
            </div>
            <div class="col s12 m12 l10">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/materialize/js/materialize.min.js') }}"></script>
    <script src="{{ asset('public/js/init.js') }}"></script>
    @stack('script')
</body>
</html>
