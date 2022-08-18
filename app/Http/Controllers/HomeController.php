<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\permisos\Model\Rol;
use App\User ;
use App\Restaurante ;
use App\Producto ;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //  return auth()->user()->id;
      $user = User::find(auth()->user()->id);     
      if($user->accesoTotal()){
          return view('home');
      }
 /* $res= Restaurante::where('user_id',auth()->user()->id)->first() ;
  if($res){
      $id= $res['user_id'];
  }*/
        $prods= Producto::get() ;    
      return view('catalogo',compact('prods'));
    }
}
