<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- script -->    
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/navAdmin/style.css')}}">
    
    <!-- Google fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

   
</head>

<body>
 <div class="app">
  <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">
                    <a class="navbar-brand" href="{{ url('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </h4>
            </div>
            <div class="menu">
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Tablero</a>

                    @can('tieneacceso', 'rol.index')
                <a href="{{route('rol.index')}}" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Roles</a>
                    @endcan 

                    @can('tieneacceso', 'Usuario.index')
                <a href="{{route('user.index')}}" class="d-block text-light p-3 border-0"><i class="icon ion-md-person lead mr-2"></i>
                    Usuarios</a>
                    @endcan

                   @can('tieneacceso', 'Categoria.index')
                    <a href="{{route('categoria.index')}}" class="d-block text-light p-3 border-0"><i class="icon ion-md-ribbon"></i>
                    Categoria</a>
                    @endcan  

                <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>
                    Configuración</a>
            </div>
        </div>
      
    
        <!-- Fin sidebar -->

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
    
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline position-relative d-inline-block my-2">
                  <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                  <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
                </form>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

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
                        <img src="{{asset('assets/perfil/user-1.png')}}" class="img-fluid rounded-circle avatar mr-2"
                        alt="https://generated.photos/" />              
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
      
          <!-- Fin Navbar -->
  
          <div id="content" class="bg-grey w-100">
            <section class="bg-light py-3">
                <div class="container">
    
                  <main class="py-4" >
                      @yield('content')
                  </main>
                  <p>Panel Administrativo todos los derechos reservados por el grupo #11</p>  
                </div>
              </section>
          </div>
   
      </div>
  <!-- Page Content -->
      
    </div>                                          
</div>
         
@yield('script')
      
</body>

</html>