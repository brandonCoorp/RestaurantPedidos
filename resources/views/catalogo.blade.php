
@extends('layouts.app3')

@section('contenido')
<div class="carruselDiv2">

<div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner">
             <div class="carousel-item active">
               <img src="{{asset('assets/img/cocacola.jpg')}}" class="d-block prodCarrusel" alt="...">
               <div class="carousel-caption d-none d-md-block">
               <h5>Coca-Cola</h5>
             </div>
           </div>

            @foreach ($prods as $prod)
           <div class="carousel-item " >
             <img src="{{$prod->Imagen}}"  class="d-block prodCarrusel" alt="...">
             <div class="carousel-caption d-none d-md-block">
               <h5>{{$prod->Nombre}}</h5>
               <p>{{$prod->Descripcion}}</p>
              </div>
            </div>
           @endforeach
     </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
</div>


  <h2 style="margin-left:20px;">Productos Nuevos</h2>
  <div class="row row-cols-1 row-cols-md-3" style="margin-left:10px;">
    @foreach ($prods as $prod)
    <div class="col mb-4">
      <div class="card col-md-10" style="display: inline-block">
         <img src="{{$prod->Imagen}}" class="card-img-top prodCatalogo" alt="...">
<!-- Button trigger modal -->
      <button type="button" value="{{$prod->id}}" id="botonAñadir" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Añadir
  </button>  
         <div class="card-body ">
             <h5 class="card-title">{{$prod->Nombre}}</h5>
             <p class="card-text">{{$prod->Descripcion}}</p>
             <p class="card-text">{{$prod->Precio}} Bs</p>
             <p class="card-text">Costo de envío : 8 Bs</p>
           </div>
       </div>
   </div>
  @endforeach
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir al Carrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <p>Cantidad
        <input type="text" disabled value="0" name="Cantidad" id="Cantidad">
        </p>
        <button type="button" id="CantidadImg" class="btn btn-success btn-circle"><i class="fa fa-plus"></i>
        <button type="button" id="CantidadImgMenos" class="btn btn-danger btn-circle"><i class="fa fa-minus"></i>
          
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" id="CerrarCantidad"class="btn btn-secondary" data-dismiss="modal">Close</button>
      <form action="{{route('carrito.store')}}" method="post"> 
        @csrf
        <input type="text" name="idProd" value="" id="idProd" hidden="none">
        <input type="text" name="CantidadInput" value="" id="CantidadInput" hidden="none" >
          
        <button type="submit" id="BotonAñadirProducto" class="btn btn-primary">Añadir</button>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection                       
  @section('script')
  <script src="{{ asset('js/sistema/catalogo.js') }}" defer></script>
  @endsection    