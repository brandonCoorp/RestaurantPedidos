<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Restaurante;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::if('EmpresaRegistrada',function(){
            $res=  Restaurante::where('user_id',auth()->user()->id)->first();
          // dd($res);
            if($res==null){
              return false;
            }
            return true;
           });
           
        Blade::if('EmpresaNoRegistrada',function(){
            $res=  Restaurante::where('user_id',auth()->user()->id)->first();
            if($res==null){
              return true;
            }
            return false;
           });
           
    }
}
