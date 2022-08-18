<?php

namespace App\permisos\Model;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //

    protected $fillable = [
        'nombre', 'slug', 'descripcion',
    ];
    
   public function roles(){
    return $this->belongsToMany('App\permisos\Model\Rol')->withTimesTamps();
} 


}
