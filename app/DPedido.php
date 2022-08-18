<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DPedido extends Model
{
    //
    protected $fillable = [
        'Cantidad','Precio','Total','pedido_id','producto_id',
    ];
}
