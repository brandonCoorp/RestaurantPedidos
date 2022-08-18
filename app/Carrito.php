<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    //
    
    protected $fillable = [
        'Estado','Total','user_id'
    ];
    public function seleccionas(){
        return $this->belongsToMany('App\Producto','Cantidad')->withTimesTamps();
    } 
}
