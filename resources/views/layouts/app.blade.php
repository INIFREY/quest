<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Wevudu{{isset($title) ? ' - '.$title : ''}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
     <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
<header>
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <!-- Branding Image -->
                <a class="brand-logo" href="{{ url('/') }}">
                    Wevudu
                </a>
                <a href="#" data-activates="nav-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>

                <ul class="right hide-on-med-and-down">

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Вхід</a></li>
                        <li><a href="{{ url('/register') }}">Реєстрація</a></li>
                        @else
                                <!-- Dropdown Structure -->
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="{{url('/profile')}}"><i class="material-icons">person</i>Профіль</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('/logout')}}"><i class="material-icons">exit_to_app</i>Вихід</a></li>
                        </ul>

                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i
                                        class="material-icons right">arrow_drop_down</i></a></li>
                    @endif
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">


                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Вхід</a></li>
                                <li><a href="{{ url('/register') }}">Реєстрація</a></li>
                                @else
                                        <!-- Dropdown Structure -->
                                <li class="bold"><a class="collapsible-header  waves-effect waves-teal">{{ Auth::user()->name }}<i
                                                class="material-icons right">arrow_drop_down</i></a>
                                    <div class="collapsible-body" style="">
                                        <ul>
                                            <li><a href="{{url('/profile')}}">Профіль</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{ url('/logout') }}">Вихід</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>

            </div>
        </div>

    </nav>
</header>
<main>
    @yield('content')
</main>

<div id="loader">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>

        <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>

        <div class="spinner-layer spinner-yellow">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>

        <div class="spinner-layer spinner-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
