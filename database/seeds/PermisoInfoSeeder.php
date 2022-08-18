<?php

use Illuminate\Database\Seeder;
use App\User;
use App\permisos\Model\Rol;
use App\permisos\Model\Permiso;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Categoria;
class PermisoInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::statement("Set foreign_Key_Checks=0");
     DB::table('rol_user')->truncate();
     DB::table('permiso_rol')->truncate();
     Permiso::truncate();
     Rol::truncate();
     DB::statement("Set foreign_Key_Checks=1");
        //
        $useradmin = User::where('email','Admin@gmail.com')->first();
  if($useradmin){
      $useradmin->delete();
  }
        $useradmin=User::create([
            'Ci'=>'11111111',
            'name' =>'Admin' ,
            'email' =>'Admin@gmail.com' ,
            'password' =>Hash::make('admin')     
        ]);
  //Rol::Admin
  $roladmi=Rol::Create([
    'nombre' =>'Admin' ,
    'slug' =>'admin' ,
    'descripcion' =>'Administrador del Sistema' ,
    'acceso-total' =>'yes' ,
  ]);
  $categoria=Categoria::Create([
    'Nombre' =>'Comidas' ,
    'Descripcion' =>'Todas las Comidas que tendran los restaurantes' ,
  ]);
  
  $categoria=Categoria::Create([
    'Nombre' =>'Bebidas' ,
    'Descripcion' =>'Todas las Bebidas como Gaseosas, cervezas, vinos,etc.' ,
  ]);
  $rolcliente=Rol::Create([
    'nombre' =>'Cliente' ,
    'slug' =>'client' ,
    'descripcion' =>'Cliente del Sistema' ,
    'acceso-total' =>'no' ,
  ]);
  $useradmin->roles()->sync([$roladmi->id]);

$permisos_all = [];
 
//permisos roles
$permisos =Permiso::create([
    'nombre' =>'List rol' ,
    'slug' =>'rol.index' ,
    'descripcion' =>'Te permite ver la lista Roles' ,
]);
 
$permisos_all[] = $permisos->id;


////////////////////////
$permisos =Permiso::create([
    'nombre' =>'Show rol' ,
    'slug' =>'rol.show' ,
    'descripcion' =>'Te permite ver el rol' ,
]);
 
$permisos_all[] = $permisos->id;

$permisos =Permiso::create([
    'nombre' =>'Edit rol' ,
    'slug' =>'rol.edit' ,
    'descripcion' =>'Te permite editar el rol' ,
]);
 
$permisos_all[] = $permisos->id;


$permisos =Permiso::create([
    'nombre' =>'create rol' ,
    'slug' =>'rol.create' ,
    'descripcion' =>'Te permite crear un rol' ,
]);
 
$permisos_all[] = $permisos->id;

$permisos =Permiso::create([
    'nombre' =>'destroy rol' ,
    'slug' =>'rol.destroy' ,
    'descripcion' =>'Te permite destruir un rol' ,
]);
 
$permisos_all[] = $permisos->id;


////////////permisos admi -> Usuarios
$permisos =Permiso::create([
    'nombre' =>'List Usuario' ,
    'slug' =>'Usuario.index' ,
    'descripcion' =>'Te permite ver la lista de Usuarios' ,
]);
 
$permisos_all[] = $permisos->id;


////////////////////////
$permisos =Permiso::create([
    'nombre' =>'Show Usuario' ,
    'slug' =>'Usuario.show' ,
    'descripcion' =>'Te permite ver el Usuario' ,
]);
 
$permisos_all[] = $permisos->id;

$permisos =Permiso::create([
    'nombre' =>'Edit Usuario' ,
    'slug' =>'Usuario.edit' ,
    'descripcion' =>'Te permite editar el Usuario' ,
]);
 
$permisos_all[] = $permisos->id;


$permisos =Permiso::create([
    'nombre' =>'create Usuario' ,
    'slug' =>'Usuario.create' ,
    'descripcion' =>'Te permite crear un Usuario' ,
]);
 
$permisos_all[] = $permisos->id;

$permisos =Permiso::create([
    'nombre' =>'destroy Usuario' ,
    'slug' =>'Usuario.destroy' ,
    'descripcion' =>'Te permite destruir un Usuario' ,
]);
 
$permisos_all[] = $permisos->id;

///new permisos //////////////

$permisos =Permiso::create([
    'nombre' =>'Show Own Usuario' ,
    'slug' =>'UsuarioOwn.show' ,
    'descripcion' =>'Te permite ver tu propio Usuario' ,
]);
 
$permisos_all[] = $permisos->id;

$permisos =Permiso::create([
    'nombre' =>'Edit Own Usuario' ,
    'slug' =>'UsuarioOwn.edit' ,
    'descripcion' =>'Te permite editar tu propio Usuario' ,
]);

//$roladmi->permisos()->sync($permisos_all);

  }
}
