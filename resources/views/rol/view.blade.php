@extends('layouts.appAdmi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Vista Datos Rol') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('rol.update', $rol->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input disabled type="text" class="form-control"
                         value="{{old('nombre', $rol->nombre)}}" name="nombre" id="nombre" placeholder="nombre">
                      </div>
                      <div class="form-group">
                        <label for="nombre">Slug</label>
                        <input type="text" class="form-control" disabled 
                        value="{{old('slug',$rol->slug)}}" name="slug" id="slug" placeholder="slug">
                      </div>
                      <div class="form-group">
                       
                        <textarea class="form-control" id="descripcion" disabled
                        name="descripcion" placeholder="Descripcion"
                       rows="3">{{old('descripcion',$rol->descripcion)}}</textarea>
                      </div>
                      <hr>
                      <h3>Acceso Total</h3>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="AccesoTotalSi" disabled
                        value="yes" name="acceso-total" class="custom-control-input"
                         @if ($rol['acceso-total']=="yes")
                          checked
                         @endif
                         @if (old('acceso-total')=="yes")
                          checked
                         @endif
                           >

                        <label class="custom-control-label" for="AccesoTotalSi">Si</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="AccesoTotalNo" disabled
                        value="no" name="acceso-total" class="custom-control-input"
                        @if ($rol['acceso-total']=="no")
                          checked
                         @endif
                         @if (old('acceso-total')=="no")
                          checked
                         @endif
                        
                     
                         >
                        <label class="custom-control-label" for="AccesoTotalNo">No</label>
                      </div>
                      <hr>
                   <h3>Permsisos</h3>
                 @foreach ($permisos as $permiso)

                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" disabled class="custom-control-input" value="{{$permiso->id}}"
                        name="permiso[]" id="permiso_{{$permiso->id}}"
                        @if (is_array(old('permiso')) && in_array("$permiso->id", old('permiso')))
                        checked
                        @elseif (is_array($permiso_rol) && in_array("$permiso->id", $permiso_rol))
                        checked
                        @endif
                        >
                        <label class="custom-control-label" for="permiso_{{$permiso->id}}">
                            {{$permiso->id}}
                            -
                            {{$permiso->nombre}} : 
                            <em>{{$permiso->descripcion}}</em>    
                        </label>
                      </div>       
                  @endforeach


                      <hr>
                    <a href="{{route('rol.edit',$rol->id)}}" class="btn btn-success">Editar</a>
                    <a href="{{route('rol.index')}}" class="btn btn-danger">volver</a>
                    
                    </div>


           </form>
           
           
           
           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection