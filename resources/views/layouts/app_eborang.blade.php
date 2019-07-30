<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #body-row {
    margin-left:0;
    margin-right:0;
}
#sidebar-container {
    min-height: 100vh;   
    background-color: #333;
    padding: 0;
}


.sidebar-expanded {
    width: 230px;
}
.sidebar-collapsed {
    width: 60px;
}


#sidebar-container .list-group a {
    height: 50px;
    color: white;
}


#sidebar-container .list-group .sidebar-submenu a {
    height: 45px;
    padding-left: 30px;
}
.sidebar-submenu {
    font-size: 0.9rem;
}


.sidebar-separator-title {
    background-color: #333;
    height: 15px;
}
.sidebar-separator {
    background-color: #333;
    height: 25px;
}
.logo-separator {
    background-color: #333;    
    height: 60px;
}

.sidebar-separator-title small{
    color: white;
    margin-right: 30px; 
}


#sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
  content: " \f0d7";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}

#sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
  content: " \f0da";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
.header-border{
    width: 100%;
    height: 200px;
}
    </style>
</head>
<body>
    <div id="app">
        <div id="header-container" class="header-border">
            <div class="headerdiv">
              <a href="" class="headerleft">
                <img src="{{asset('image/header.jpg')}}" class="img-fluid" alt="header SU">
              </a>
            </div>     
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
            </div>
        </nav>
        <div class="container-fluid">
                <div class="row">
                        <div class="col-md-2" style="padding:0">
                            <div class="row" id="body-row">
                                <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
                                    <ul class="list-group">
                                        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                                            <small>MAIN MENU</small>
                                            @if (Auth::user())
                                            <small>{{ Auth::user()->roles->first()->name }}</small>    
                                            @endif
                                        </li>
                                        @yield('sidebar')
                                    </ul>
                                </div> 
                        </div>        
                        </div>
                        <div class="col-md-10" style="padding:0">
                            <main class="py-4" style="background:white;min-height: 100vh">
                                <div style="padding:20px">
                                    @yield('content')
                                </div>
                                
                            </main>        
                        </div>
                    </div>
        </div>
        
        
</body>
</html>
