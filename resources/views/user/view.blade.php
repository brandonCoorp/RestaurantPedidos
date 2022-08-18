@extends('layouts.appAdmi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Vista Datos user') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('user.update', $user->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                     <div class="containner">
                     
                      <h3>Requisito de Datos</h3>
                      <div class="form-group">
                       <label for="nombre">Nombre</label>
                       <input type="text" class="form-control" disabled
                        value="{{old('nombre', $user->name)}}" name="nombre" id="nombre" placeholder="nombre">
                     </div>
                     <div class="form-group">
                       <label for="nombre">email</label>
                       <input type="text" class="form-control" disabled 
                       value="{{old('email',$user->email)}}" name="email" id="email" placeholder="email">
                     </div>
                     
                    
                     <div class="form-group">
                       
                     <label for="nombre">Rol : </label>  
                         <select disabled name="roles" id="roles"> 
                           @foreach ($roles as $rol)
                              <option value="{{$rol->id}}"
                               @isset($user->roles[0]->nombre)
                                   @if ($rol->nombre == $user->roles[0]->nombre)
                                       selected
                                   @endif
                               @endisset
                               >{{$rol->nombre}}</option>
                          @endforeach

                         </select>
                     </div>



                      <hr>
                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-success">Editar</a>
                    <a href="{{route('user.index')}}" class="btn btn-danger">volver</a>
                    
                    </div>


           </form>
           
           
           
           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection