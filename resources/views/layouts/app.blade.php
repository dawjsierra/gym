<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            height: 1000px;
            background: rgb(255, 255, 255);
            background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(249, 250, 255, 1) 73%, rgba(103, 133, 255, 1) 100%);
        }

        a{
            width: 120px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            text-decoration: none;
           
        }

        .botones{
            color: white;
        border: solid 1px white;
        margin-left: 10px;
        }
        #contenido {
            display: flex;
            flex-direction: row;

        }

        #usuario {
  
            text-align: left;
            color: white;
            text-shadow: 4px 4px 4px black;
            
        }

        #contenido a {
            border: 1px black solid;
            border-radius: 5px;
            padding: 5px;
            margin-left: 5px;
            text-decoration: none;
            background-color: lightblue;
            color: black;
        }

        #contenido a:hover {
            background-color: cadetblue;
        }

        #contenido p {
            position: absolute;
            text-align: center;
        }


        #app {
            width: 100%;
     
        }

       
        #contenedor {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md ">
            <div class="container">



                <div class="collapse navbar-collapse" id="contenedor">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <a class="nav-link btn btn-primary botones" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                        <a class="nav-link btn btn-primary botones" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                        @else
                        <h2 id="usuario"> saludos usuario {{ Auth::user()->name }} </h2>
                        <div id="contenido">




                            <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                           
                            
                            <a href="/users/show/{{ Auth::user()->id }}" class="btn btn-primary float-right">Ver Perfil</a><br />
                            <a href="/sesions" class="btn btn-primary float-right">Ver sesiones</a><br />
                            <a href="/sesions/filterView" class="btn btn-primary float-right">Buscar sesiones</a><br />
                            <a href="/activities" class="btn btn-primary float-right">Ver actividades</a><br />
                        </div>

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
