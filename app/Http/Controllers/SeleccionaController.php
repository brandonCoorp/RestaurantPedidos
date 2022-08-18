<?php

namespace App\Http\Controllers;

use App\Selecciona;
use App\Carrito;
use App\Producto;

use Illuminate\Http\Request;

class SeleccionaController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Selecciona  $selecciona
     * @return \Illuminate\Http\Response
     */
    public function show(Selecciona $selecciona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Selecciona  $selecciona
     * @return \Illuminate\Http\Response
     */
    public function edit(Selecciona $selecciona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Selecciona  $selecciona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Selecciona $selecciona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Selecciona  $selecciona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Selecciona $selecciona)
    {
        //
        $producto = Producto::find($selecciona->producto_id);
        $cant = $selecciona->Cantidad;
        $selecciona->delete();
     $car=Carrito::where('user_id',auth()->user()->id)->first();
            $selec=Selecciona::where('carrito_id',$car->id)->first();
            if($selec){
                $menos= $producto->Precio*$cant;
                $total = $car->Total - $menos;
                $car->Total=$total;
                $car->save();
                return redirect()->route('carrito.index')->with('status_success','Producto Eliminado con Exito');
            }
             $car->delete();
            return redirect()->route('home');
    }
}
