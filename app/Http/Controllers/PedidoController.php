<?php

namespace App\Http\Controllers;
use App\Pedido;
use App\Factura;
use App\Selecciona;
use App\Carrito;
use App\DFactura;
use App\DPedido;
use App\Persona;
use App\Producto;
use App\User;

use Illuminate\Http\Request;
use App\Mail\facturacorreo;
use Mail;
use PDF;
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "hola" ;
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
        //estado: 1 en curso, 2 Entregado, 4 Rechazado
       $estado =1;
     //Pedido-----------------------------------------------------  
       $persona = Persona::where('Ci',auth()->user()->Ci)->first();
       $carrito = Carrito::find($id);
        $pedido = Pedido::create([
       'Ci' => auth()->user()->Ci,
       'Fecha' => date("Y-m-d H:i:s"),
       'Direccion' => $persona->Direccion,
       'Monto' => $carrito->Total,
       'Estado' =>$estado,
       'carrito_id'=> $carrito->id,
        ]);
   $this->dpedido($carrito,$pedido);
   ////factura---------------------------------
   $costsend=12;
   $tot = $pedido->Monto + $costsend;
   $searchPed =DPedido::where('pedido_id',$pedido->id)->first();
   $searchProd = Producto::find($searchPed->producto_id);
   $factura = Factura::create([
    'user_id' => auth()->user()->id,
    'Fecha' => date("Y-m-d H:i:s"),
    'Direccion' => $persona->Direccion,
    'MontoProd' => $pedido->Monto,
    'CostEnvio' =>$costsend,
    'Total' =>$tot,
    'restaurante_id'=> $searchProd->restaurante_id,
   ]);
   $this->dfactura($factura,$pedido);
   
////Enviar Correo Factura --------------------------
Mail::to(auth()->user()->email)->send(new facturacorreo(auth()->user()->id,$factura->id));
$selecciona =Selecciona::get();
  foreach ($selecciona as $key => $value) {
      if($value->carrito_id == $carrito->id){
          $value->delete();
      }
  }
  $carrito->delete();
        return redirect()->route('home');
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
    public function dpedido(Carrito $car, Pedido $pedido)
    {
        $selec = Selecciona::get();
           foreach ($selec as $key => $value) {
            if($car->id == $value->carrito_id)
            {
             $producto = Producto::find($value->producto_id);
             $total = $producto->Precio* $value->Cantidad;
                $dpedido =DPedido::create([
                    'Cantidad' => $value->Cantidad,
                    'Precio' => $producto->Precio,
                    'Total' => $total,
                    'pedido_id' => $pedido->id,
                    'producto_id' => $value->producto_id,
                ]);
            }
        }    
    }
    public function dfactura(Factura $factura, Pedido $pedido)
    {
        $selec = DPedido::get();
           foreach ($selec as $key => $value) {
            if($pedido->id == $value->pedido_id)
            {
                $dfactura =DFactura::create([
                    'Cantidad' => $value->Cantidad,
                    'Precio' => $value->Precio,
                    'Total' => $value->Total,
                    'factura_id' => $factura->id,
                    'producto_id' => $value->producto_id,
                ]);
            }
        }    
    }

    public function factura($usuario,$venta){
        $dfactura= DFactura::get();
       $factura = Factura::find($venta); 
       $persona = User::Find($usuario);
       foreach ($dfactura as $key => $value) {
              if ($value->factura_id == $venta) {
                $dfacturas[]=$value; 
                $productos[] = Producto::find($value->producto_id); 
              }
           
        }       
        $pdf = PDF::loadView('mail.factura',['productos' => $productos,'persona' => $persona, 'dfacturas' => $dfacturas,'factura' => $factura]);
        return $pdf->stream();
      //  return "hola";
    }

}
