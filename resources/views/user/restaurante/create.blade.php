@extends('layouts.app3')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Crear Restaurante') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('restaurante.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control"
                         value="{{old('Nombre')}}" name="Nombre" id="Nombre" placeholder="Nombre">
                      </div>
                      <div class="form-group">
                        <label for="TipoComercio">Tipo de Comercio</label>
                        <input type="text" class="form-control"
                         value="{{old('TipoComercio')}}" name="TipoComercio" id="TipoComercio" placeholder="comida o bebidas">
                      </div>
                      <div class="form-group">
                        <label for="Direccion">Direccion</label>
                        <input type="text" class="form-control"
                         value="{{old('Direccion')}}" name="Direccion" id="Direccion" placeholder="Av">
                      </div>
                      
                      <div class="form-group">
                        <label for="Ciudad">Ciudad</label>
                        <input type="text" class="form-control"
                         value="{{old('Ciudad')}}" name="Ciudad" id="Ciudad" placeholder="">
                      </div>
                      
                      <div class="form-group">
                        <label for="Correo">Correo</label>
                        <input type="text" class="form-control"
                         value="{{old('Correo')}}" name="Correo" id="Correo" placeholder="">
                      </div>
                      
                      <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <input type="text" class="form-control"
                         value="{{old('Telefono')}}" name="Telefono" id="Telefono" placeholder="">
                      </div>
                      

                      <div class="form-group">
                        <label for="Imagen">Imagen</label>
                        <input type="file" class="form-control-file" accept="image/*"
                         value="{{old('Imagen')}}" name="Imagen" id="Imagen" >
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