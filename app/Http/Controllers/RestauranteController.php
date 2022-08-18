<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurante;
use App\Producto;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rest=Restaurante::where('user_id',auth()->user()->id)->first();
       // dd($rest);
      //return $rest;
     // dd($rest->id);
     
      $productos = Producto::where('restaurante_id',$rest->id)->orderby('id','Desc')->paginate(5);
     //dd($productos[0]);
      return view('user/restaurante.index',compact('rest','productos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user/restaurante.create' );
    
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
            'Nombre'=>'required|max:50|unique:restaurantes,Nombre',
            'TipoComercio'=>'required|',
            'Direccion'=>'required',
            'Ciudad'=>'required|string',
            'Correo'=>'required|email|unique:restaurantes,Correo',
            'Imagen'=>'image',
            ]);
       // Restaurante::create($request->all());
       if($request->hasfile('Imagen')){
           $image=$request->file('Imagen');
           $nombre =$request->input('Nombre').$image->getClientOriginalName();
           $ruta=public_path().'/assets/LogoEmpresa/';
           $image-> move($ruta,$nombre);
        $url ='assets/LogoEmpresa/'.$nombre;
       }
      
     Restaurante::create([
        'Nombre' =>$request->input('Nombre') ,
        'Direccion' =>$request->input('Direccion') ,
        'Telefono' =>$request->input('Telefono') ,
        'Ciudad' =>$request->input('Ciudad') ,
        'TipoComercio' =>$request->input('TipoComercio') ,
        'Correo' =>$request->input('Correo') ,
        'Imagen' =>$url ,
        'user_id' =>auth()->user()->id ,
        
        
        
     ]);
  $restaurante = Restaurante::find(1);
 // return redirect()->route('restaurante.index');
    return redirect()->route('restaurante.index');
        
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
