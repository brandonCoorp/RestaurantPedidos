<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $fillable = [
        'Fecha','Direccion','MontoProd','CostEnvio','Total','restaurante_id',
        'user_id',
    ];
}