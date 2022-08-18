<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurante;
use App\Producto;
use App\Categoria;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rest=Restaurante::where('user_id',auth()->user()->id)->first();
        $cates=Categoria::get();
        return view('user.producto.create',compact('rest','cates'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $request->validate([
            'Nombre'=>'required|max:50|unique:productos,Nombre',
            'Descripcion'=>'required',
            'Imagen'=>'image',
            ]);
            $empresa=Restaurante::where('user_id',auth()->user()->id)->first();
            $prod=Producto::orderby('id','Desc')->first();
           if($prod){
            $prod=$prod->id + 1;
           }
            if($request->hasfile('Imagen')){
                $image=$request->file('Imagen');
                $nombre =$empresa->Nombre.'Prod'.$prod;
                
                $ruta=public_path().'/assets/productos/';
                $image-> move($ruta,$nombre);
             $url ='assets/productos/'.$nombre;
            }
           $estado=1;
          Producto::create([
             'Nombre' =>$request->input('Nombre') ,
             'Descripcion' =>$request->input('Descripcion') ,
             'Precio' =>$request->input('Precio') ,
             'Estado' =>$estado ,
             'restaurante_id' =>$empresa->id ,
             'categoria_id' =>$request->input('Categoria') ,
             'Imagen' =>$url ,
          ]);
            return redirect()->route('restaurante.index')->with('status_success','Producto guardado con Exito');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
