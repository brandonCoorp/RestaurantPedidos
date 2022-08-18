@extends('layouts.appAdmi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
              @can('tieneacceso', 'categoria.create')
                
                <a href="{{route('categoria.create')}}" 
                class="btn btn-primary float-right">Crear</a>
                <br><br> 
                @endcan
             
                @include('Custom.mensaje')

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>
    
       @foreach ($cates as $cate)
       <tr>
       <th scope="row">{{$cate->id}}</th>
       <td>{{$cate->nombre}}</td>
       <td>{{$cate->descripcion}}</td>
      <td>
        @can('tieneacceso', 'rol.edit')
        <a class="btn btn-success" href="{{route('categoria.edit',$cate->id)}}">Editar</a>
        @endcan</td>  
      <td>
        @can('tieneacceso', 'rol.destroy')
      <form action="{{route('categoria.destroy',$cate->id)}}" method="post">
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
 {{ $cates->links()}}

        </div>
     </div>
  </div>
</div>
@endsection