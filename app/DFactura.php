<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DFactura extends Model
{
    //
    protected $fillable = [
        'Cantidad','Precio','Total','factura_id','producto_id',
    ];
}