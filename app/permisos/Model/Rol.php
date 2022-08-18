<?php

namespace App\permisos\Model;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $fillable = [
        'nombre', 'slug', 'descripcion','acceso-total',
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimesTamps();
    }

    public function permisos(){
        return $this->belongsToMany('App\permisos\Model\Permiso')->withTimesTamps();
    } 
    
}
