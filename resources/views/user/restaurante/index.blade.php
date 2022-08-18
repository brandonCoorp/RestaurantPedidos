@extends('user.restaurante.nav')

@section('contenido2')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                
                <a href="{{route('producto.create')}}" 
                class="btn btn-primary float-right">Crear Productos</a>
                <br><br> 
             
                @include('Custom.mensaje')

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Imagen</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio en Bs</th>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>
    
      @foreach ($productos as $producto)
      <tr>
      <th scope="row">{{$producto->id}}</th>
      <td><img src="{{$producto->Imagen}}" width="150px" alt=""></td>  
      <td>{{$producto->Nombre}}</td>
      <td>{{$producto->Descripcion}}</td>
      <td>{{$producto->Precio}}</td>
     <td>
       <a class="btn btn-success" href="{{route('producto.edit',$producto->id)}}">Editar</a>
    </td>  
     <td>
     <form action="{{route('producto.destroy',$producto->id)}}" method="post">
     @csrf
     @method('DELETE')
       <button class="btn btn-danger">Eliminar</button>

     </form>
     </td>  
      
     </tr>
      @endforeach
       
    
    </tbody>
  </table>


        </div>
     </div>
  </div>
</div>

</div>
@endsection