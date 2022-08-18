<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    //
    protected $fillable = [
     'Nombre','Direccion', 'Telefono', 'Ciudad',
     'Correo','Imagen','TipoComercio','user_id',
    ];
}
