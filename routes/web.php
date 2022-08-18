<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\permisos\Model\Rol;
use App\permisos\Model\Permiso;
use Illuminate\Support\Facades\Gate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.login');
});

Auth::routes();
Route::post('/','LoginController@login')->name('logine');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/carrito','CarritoController')->names('carrito');

Route::resource('/rol', 'RolController')->names('rol');
Route::resource('/categoria', 'CategoriaController')->names('categoria');
Route::resource('/producto', 'ProductoController')->names('producto');
Route::resource('/selecciona', 'SeleccionaController')->names('selecciona');
Route::resource('/Pedido', 'PedidoController')->names('pedido');

Route::get('/factura/{user}/{venta}','PedidoController@factura')->name('factura');

Route::resource('/user', 'UserController',['except'=>['create','store']])->names('user');
Route::resource('/Restaurante', 'RestauranteController')->names('restaurante');


Route::get('/test', function () {
  $user = User::find(2);
  //$user->roles()->sync([2]);
  Gate::authorize('tieneacceso','rol.destroy');
 //return $user;
 //  return $user->tienePermisos('rol.show');
});



Route::get('payment', 'PaymentController@index');
Route::post('charge', 'PaymentController@charge');
Route::get('paymentsuccess', 'PaymentController@payment_success');
Route::get('paymenterror', 'PaymentController@payment_error');



/*Route::get('/test', function(){
 /*return Permiso::create([
    'nombre'=>'List Producto',
    'slug'=>'product.index',
    'descripcion'=>'Puede los permisos dentro del sistema',
     
  ]);

  return Rol::create([
    'nombre'=>'Cliente',
    'slug'=>'cliente',
    'descripcion'=>'Cliente del sistema',
     
  ]);



$rol = Rol::find(2);
$rol->permisos()->sync([1,2]);
//return 'hola';
return $rol->permisos;

/*  $user = User::find(1);
  $user->roles()->sync([1,2]);
//return 'hola';
  return $user->roles;
 
});*/
