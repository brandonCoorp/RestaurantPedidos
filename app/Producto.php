<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = [
        'Nombre','Descripcion', 'Precio', 'Estado','Imagen',
        'categoria_id','restaurante_id',
    ];
    public function seleccionas(){
        return $this->belongsToMany('App\Carrito','Cantidad')->withTimesTamps();
    } 
}
