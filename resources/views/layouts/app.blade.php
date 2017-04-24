<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wevudu{{isset($title) ? ' - '.$title : ''}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa.fa-btn {
            margin-right: 0;
        }
    </style>
</head>
<body id="app-layout">
    <nav>
        <div class="nav-wrapper">
            <!-- Branding Image -->
            <a class="brand-logo" href="{{ url('/') }}">
                Laravel
            </a>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="{{ url('/home') }}">Home</a></li>

                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <!-- Dropdown Structure -->
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        <li class="divider"></li>
                        <li><a href="#!">Test</a></li>
                    </ul>

                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                @endif
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a href="{{ url('/home') }}" class="waves-effect waves-teal">Home</a></li>

                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                    <!-- Dropdown Structure -->
                            <li class="bold"><a class="collapsible-header  waves-effect waves-teal">{{ Auth::user()->name }}<i
                                            class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body" style="">
                                    <ul>
                                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#!">Test</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="js/materialize.js"></script>
    <script src="js/jquery.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
