@extends('user.restaurante.nav')

@section('contenido2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Crear Producto') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control"
                         value="{{old('Nombre')}}" name="Nombre" id="Nombre" placeholder="Nombre">
                      </div>
                    
                      <div class="form-group"> 
                        <textarea class="form-control" id="Descripcion"
                        name="Descripcion" placeholder="Descripcion"
                       rows="3">{{old('Descripcion')}}</textarea>
                      </div>            
                    
                      <div class="form-group">
                        <label for="Precio">Precio en Bs</label>
                        <input type="number" class="form-control" min="0.00" max="10000.00" step="0.10"
                         value="{{old('Precio')}}" name="Precio" id="Precio" placeholder="0.0">
                      </div>
                     
                      <div class="form-group">
                        <label for="Categoria">Categoria : </label>  
                        <select class="form-control" name="Categoria" id="Categoria"> 
                          @foreach ($cates as $cate)
                             <option value="{{$cate->id}}"
                              >{{$cate->nombre}}</option>
                         @endforeach
  
                        </select>
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