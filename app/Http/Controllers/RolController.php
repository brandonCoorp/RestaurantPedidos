<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\permisos\Model\Rol;
use App\permisos\Model\Permiso;
use Illuminate\Support\Facades\Gate;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Gate::authorize('tieneacceso','rol.index');
 
        $roles =Rol::orderBy('id','Desc')->paginate(2);
        return view('rol.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Gate::authorize('tieneacceso','rol.create');
 
            $permisos=Permiso::get();
            return view('rol.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Gate::authorize('tieneacceso','rol.create');
 
        $request->validate([
        'nombre'=>'required|max:50|unique:rols,nombre',
        'slug'=>'required|max:50|unique:rols,slug',
        'acceso-total'=>'required|in:yes,no'
        ]);
   $rol =Rol::create($request->all());
 // if($request->get('permiso')){
      $rol->permisos()->sync($request->get('permiso'));
   //}
        return redirect()->route('rol.index')->with('status_success','Rol guardado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
        $this->authorize('tieneacceso','rol.show');
 
        $permiso_rol=[];
       foreach($rol->permisos as $permisos){
         $permiso_rol[]= $permisos->id;
        }
        $permisos=Permiso::get();
       return view('rol.view', compact('permisos','rol','permiso_rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)   //cambiamos el $id por una variable de tipo rol para que nos de todo los datos del rol
    {
        //cuando pasamos id buscamos de este modo ->  $rol=Rol::findOrFail($id);
        $this->authorize('tieneacceso','rol.edit');

        $permiso_rol=[];
       foreach($rol->permisos as $permisos){
         $permiso_rol[]= $permisos->id;
        }
        $permisos=Permiso::get();
       return view('rol.edit', compact('permisos','rol','permiso_rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Rol $rol)
    {
              //
              $this->authorize('tieneacceso','rol.edit');
    
              $request->validate([
                'nombre'=>'required|max:50|unique:rols,nombre,'.$rol->id,
                'slug'=>'required|max:50|unique:rols,slug,'.$rol->id,
                'acceso-total'=>'required|in:yes,no'
                ]);
           $rol->update($request->all());
//          if($request->get('permiso')){
              $rol->permisos()->sync($request->get('permiso'));
  //         }
                return redirect()->route('rol.index')->with('status_success','Rol Modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        //
        $this->authorize('tieneacceso','rol.destroy');

        $rol->delete();
        return redirect()->route('rol.index')->with('status_success','Rol Eliminado con Exito');
        
    }
}
