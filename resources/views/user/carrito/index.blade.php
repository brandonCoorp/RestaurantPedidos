@extends('layouts.app3')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
              @can('tieneacceso', 'rol.create')
                
                <a href="{{route('rol.create')}}" 
                class="btn btn-primary float-right">Crear</a>
                <br><br> 
                @endcan
             
                @include('Custom.mensaje')

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Imagen</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio en Bs</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Total</th>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>
       
     <h2>Tarjeta de Productos</h2>
       @foreach ($productos as $producto)
       <tr>
       <th scope="row">{{$producto->id}}</th>
       <td><img src="{{$producto->Imagen}}" width="60px" alt=""></td>
       <td>{{$producto->Nombre}}</td>
       <td>{{$producto->Precio}}</td>        
       @foreach ($seleccions as $seleccion)
       @if ($producto->id == $seleccion->producto_id)
       <td>{{$seleccion->Cantidad}}</td>
       <td>{{$seleccion->Cantidad * $producto->Precio}}</td>        
       <td>
        <form action="{{route('selecciona.destroy',$seleccion->id)}}" method="post">
        @csrf
        @method('DELETE')
          <button class="btn btn-danger">Eliminar</button>
        </form>
       
        </td>  
       @endif
       @endforeach
    </tr>
       @endforeach
     <tr>
       <td></td><td></td><td></td>
       <td>Costo de envío : 12 Bs</td><td></td><td></td>
       </tr>  
       <tr>
        <td></td><td></td><td></td>
       <td><p> Total a Pagar : {{$total}} en Bs.</p></td><td></td><td></td>
        </tr>  
       <tr>
        <td></td><td></td><td></td>
       <td><p> Total a Pagar : {{round($total/6.89,2)}} en $us.</p></td><td></td><td></td>
        </tr>  
    </tbody>
  </table>
  <h4>selecione una forma de pago :</h4>
  <form action="{{ url('charge') }}" method="post">
  <input type="text" name="amount" value="{{round($total/6.89,2)}}" hidden="none"/>
     {{ csrf_field() }}
  <img src="{{asset('assets/img/paypal.png')}}" width="20%" alt="">
  <input type="submit" class="btn btn-primary"  name="submit" value="Pagar"> 
</form>
   
        </div>
     </div>
  </div>
</div>

</div>
@endsection