<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $fillable = [
        'Ci','Fecha','Direccion','Estado','Monto','carrito_id',
    ];
}
