@extends('layouts.appAdmi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Editar user') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('user.update', $user->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control"
                         value="{{old('name', $user->name)}}" name="name" id="name" placeholder="nombre">
                      </div>
                      <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" 
                        value="{{old('email',$user->email)}}" name="email" id="email" placeholder="email">
                      </div>
                      
                     
                      <div class="form-group">
                        
                      <label for="nombre">Rol : </label>  
                          <select name="roles" id="roles"> 
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
                      <button type="submit" class="btn btn-primary" >Guardar</button> 
                    </div>


           </form>
           
           
           
           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection