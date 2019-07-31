<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    
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
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
              <div class="sidebar-heading">{{ config('app.name', 'Laravel') }} </div>
              <div class="list-group list-group-flush">
                @yield('sidebar')
                {{-- <a href="#homeSubmenu" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Dashboard</a>
                <ul class="list-unstyled collapse" id="homeSubmenu" style="">
                    <li>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Home 1</a>
                    </li>
                    <li>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Home 2</a>
                    </li>
                    <li>
                        <a href="#" class="list-group-item list-group-item-action bg-light">Home 3</a>
                    </li>
                </ul>
                <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> --}}
              </div>
            </div>
            <!-- /#sidebar-wrapper -->
        
            <!-- Page Content -->
            <div id="page-content-wrapper">
        
              <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-align-left"></i></button>
        
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    {{-- <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li> --}}
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
                            <a class="dropdown-item" href="#">Beranda</a>
                            <div class="dropdown-divider"></div>
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
              </nav>
        
              <div class="container-fluid" style="padding-top:15px;padding-bottom:15px">
                @yield('content')
                <h1 class="mt-4">Simple Sidebar</h1>
                <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
              </div>
            </div>
            <!-- /#page-content-wrapper -->
        
          </div>
          <!-- /#wrapper -->
        
          <!-- Bootstrap core JavaScript -->
          <script src="{{ asset('js/external/js/bootstrap.bundle.min.js') }}" defer></script>

          <!-- Menu Toggle Script -->
          <script>
            $(document).ready(function(){
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
            });  
            // $("#menu-toggle").click(function(e) {
            //   e.preventDefault();
            //   $("#wrapper").toggleClass("toggled");
            // });
          </script>
        
</body>
<!-- Footer -->
<footer class="page-footer font-small footer-bg">

        {{-- <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">
      
          <!-- Grid row -->
          <div class="row">
      
            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">
      
              <!-- Content -->
              <h5 class="text-uppercase">Footer Content</h5>
              <p>Here you can use rows and columns to organize your footer content.</p>
      
            </div>
            <!-- Grid column -->
      
            <hr class="clearfix w-100 d-md-none pb-3">
      
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
      
              <!-- Links -->
              <h5 class="text-uppercase">Links</h5>
      
              <ul class="list-unstyled">
                <li>
                  <a href="#!">Link 1</a>
                </li>
                <li>
                  <a href="#!">Link 2</a>
                </li>
                <li>
                  <a href="#!">Link 3</a>
                </li>
                <li>
                  <a href="#!">Link 4</a>
                </li>
              </ul>
      
            </div>
            <!-- Grid column -->
      
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
      
              <!-- Links -->
              <h5 class="text-uppercase">Links</h5>
      
              <ul class="list-unstyled">
                <li>
                  <a href="#!">Link 1</a>
                </li>
                <li>
                  <a href="#!">Link 2</a>
                </li>
                <li>
                  <a href="#!">Link 3</a>
                </li>
                <li>
                  <a href="#!">Link 4</a>
                </li>
              </ul>
      
            </div>
            <!-- Grid column -->
      
          </div>
          <!-- Grid row -->
      
        </div>
        <!-- Footer Links --> --}}
      
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
          <a href="#"> STIMIK</a>
        </div>
        <!-- Copyright -->
      
      </footer>
      <!-- Footer -->
</html>
