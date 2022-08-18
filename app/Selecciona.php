<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selecciona extends Model
{
    //
    protected $fillable = [
        'carrito_id','producto_id', 'Cantidad',
    ];

}
