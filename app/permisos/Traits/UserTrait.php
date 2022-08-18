<?php
namespace App\permisos\Traits;

/**
 * 
 */
trait UserTrait
{
    
    public function roles(){
        return $this->belongsToMany('App\permisos\Model\Rol')->withTimesTamps();
    } 
    
    public function tienePermisos($permiso){
        foreach ($this->roles as $rols) {
            if($rols['acceso-total']=='yes'){
                return true;
            }
        }
        foreach ($rols->permisos as $permi) {
            if($permi['slug']==$permiso){
                return true;
            }
        }
        return false;
    } 

 public function accesoTotal(){
    foreach ($this->roles as $rols) {
        if($rols['acceso-total']=='yes'){
            return true;
        }
    }
    return false ;
 }


}
?>