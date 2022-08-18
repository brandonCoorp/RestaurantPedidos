<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use App\Producto;
use App\Selecciona;
class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carrito=Carrito::where('user_id',auth()->user()->id)->first();
       // dd($productos);
      if($carrito){
       $seleccions=Selecciona::where('carrito_id',$carrito->id)->get();
       
      
       foreach ($seleccions as $key => $value) {
        $productos[]=Producto::find($value->producto_id);
        } 
        $total= $carrito->Total + 12 ;
        return view('user.carrito.index',compact('productos','seleccions','total'));
    }else{
        return redirect()->route('home');
        
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "hola";
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
       $prod= Producto::find($request->input('idProd'));
       $cant = $request->input('CantidadInput');
         $carrito= Carrito::where('user_id',auth()->user()->id)->first();
         
         $total= $prod->Precio * $cant;
         $estado= 1;
         if(!$carrito){ 
            $car= Carrito::create([
                'Estado' =>$estado ,
                'Total' =>$total ,
                'user_id' =>auth()->user()->id ,
                ]);
        }else{
            $tot=$carrito->Total + $total;
            $carrito->Total = $tot;
            $carrito->save();
            $car=$carrito;
        }
        
        $selec = Selecciona::get();
      //dd(is_a($selec, 'Selecciona'));
      $var = true;
        if($selec){
           foreach ($selec as $key => $value) {
            if($prod->id == $value->producto_id && $car->id == $value->carrito_id)
            {
             $tota=$value->Cantidad + $cant;
             $value->Cantidad = $tota;
             $value->save();
             $var=false;
            }
        }
            if($var){
                $prodcar = Selecciona::create([
                    'carrito_id' =>$car->id ,
                    'producto_id' =>$prod->id,
                    'Cantidad' =>$cant, 
                  ]);      
            }
        }
       // dd($var);                        
      return redirect()->route('home');
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
