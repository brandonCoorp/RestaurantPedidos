@extends('layouts.app3')

@section('contenido')
<div class="containner" style="background-color: #3fde8f" >
  <div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="{{asset($rest->Imagen)}}" class="img-thumbnail" width="80px" alt="">
  <h2 style="display: inline-block;">{{$rest->Nombre}}</h2>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="#">Editar Empresa <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="#">Ventas</a>
      <a class="nav-link" href="#">Productos</a>
    </div>
  </div>
</nav>
</div>

<div>
    @yield('contenido2')
 </div>
  @endsection