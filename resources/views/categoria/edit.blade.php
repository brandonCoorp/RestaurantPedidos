@extends('layouts.appAdmi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Editar Categoria') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('categoria.update', $cate->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control"
                         value="{{old('nombre', $cate->nombre)}}" name="nombre" id="nombre" placeholder="nombre">
                      </div>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="descripcion"
                       rows="3">{{old('descripcion',$cate->descripcion)}}</textarea>
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