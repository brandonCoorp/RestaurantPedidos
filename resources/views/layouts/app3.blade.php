<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="{{ asset('js/nav/nav.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/nav/style2.css')}}">

  </head>
  <body>
    <div id="app">
    <nav>
      <div class="menu-icon">
<span class="fas fa-bars"></span></div>
<div class="logo">
    <a class="navbar-brand" href="{{ url('/home') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button></div>
<div class="nav-items">
<li><a href="#">Restaurante</a></li>
<li><a href="#">Comidas</a></li>
<li><a href="#">Bebidas</a></li>
@EmpresaRegistrada
    <li><a href="{{route('restaurante.index')}}">Empresa</a></li>     
@endEmpresaRegistrada
@EmpresaNoRegistrada
    <li><a href="{{route('restaurante.create')}}">Registrar Empresa</a></li>    
    @endEmpresaNoRegistrada

</div>
<div class="search-icon">
<span class="fas fa-search"></span></div>
<div class="cancel-icon">
<span class="fas fa-times"></span></div>
<form action="#">
        <input type="search" class="search-data" placeholder="Search" required>
        <button type="submit" class="fas fa-search"></button>
      </form>
 
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
  <div > 
    <a href="{{route('carrito.index')}}"><button type="button" id="Carrito" class="btn btn-success btn-circle"><i class="fa fa-cart-plus"></i>
            
        </button></a>    
  </div>
</nav>
<main class="py-4">
    @yield('contenido')
</main>
</div>
@yield('script')
</body>
</html>
