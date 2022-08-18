@extends('layouts.appAdmi')

@section('content')
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
        <th scope="col">Nombre</th>
        <th scope="col">Slug</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Acceso-Total</th>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>
    
       @foreach ($roles as $rol)
       <tr>
       <th scope="row">{{$rol->id}}</th>
       <td>{{$rol->nombre}}</td>
       <td>{{$rol->slug}}</td>
       <td>{{$rol->descripcion}}</td>
       <td>{{$rol['acceso-total']}}</td>  
      <td>
        @can('tieneacceso', 'rol.show')
        <a class="btn btn-info" href="{{route('rol.show',$rol->id)}}">Ver</a>
        @endcan
      </td>  
      <td>
        @can('tieneacceso', 'rol.edit')
        <a class="btn btn-success" href="{{route('rol.edit',$rol->id)}}">Editar</a>
        @endcan</td>  
      <td>
        @can('tieneacceso', 'rol.destroy')
      <form action="{{route('rol.destroy',$rol->id)}}" method="post">
      @csrf
      @method('DELETE')
        <button class="btn btn-danger">Eliminar</button>

      </form>
      @endcan
      </td>  
       
      </tr>
       @endforeach
        
    </tbody>
  </table>
 {{ $roles->links()}}

        </div>
     </div>
  </div>
</div>
@endsection