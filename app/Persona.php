<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $fillable = [
     'Ci','nombre', 'Apellido', 'Telefono','Direccion'
    ];

}
