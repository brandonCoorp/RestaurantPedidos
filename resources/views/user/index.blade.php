@extends('layouts.appAdmi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">

                <br><br> 

                @include('Custom.mensaje')

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">email</th>
        <th scope="col">rol</th>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>
    
       @foreach ($users as $user)
       <tr>
       <th scope="row">{{$user->id}}</th>
       <td>{{$user->name}}</td>
       <td>{{$user->email}}</td>
       <td>{{$user->roles[0]->nombre}}</td>  
      <td>
        @can('tieneacceso', 'Usuario.show')
        <a class="btn btn-info" href="{{route('user.show',$user->id)}}">Ver</a>
      @endcan</td>  
      <td>
        @can('tieneacceso', 'Usuario.edit')
        <a class="btn btn-success" href="{{route('user.edit',$user->id)}}">Editar</a>
        @endcan</td>  
        <td>
          @can('tieneacceso', 'Usuario.destroy')  
      <form action="{{route('user.destroy',$user->id)}}" method="post">
      @csrf
      @method('DELETE')
        <button class="btn btn-danger">Eliminar</button>

      </form>
      @endcan </td>  
       
      </tr>
       @endforeach
        
    </tbody>
  </table>
 {{ $users->links()}}

        </div>
     </div>
  </div>
</div>
@endsection