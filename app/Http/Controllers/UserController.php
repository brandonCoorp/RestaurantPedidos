<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\permisos\Model\Rol;
use App\User ;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('tieneacceso','Usuario.index');
 
        $users =User::orderBy('id','Desc')->paginate(2);
        //return $users;
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      //  $this->authorize('create', User::class);
        return 'create';
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $this->authorize('view', [$user,['Usuario.show','UsuarioOwn.edit']]);
        $roles =Rol::orderBy('nombre')->get();
        return view('user.view', compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $this->authorize('update', [$user,['Usuario.edit','UsuarioOwn.edit']]);
        $roles =Rol::orderBy('nombre')->get();
       return view('user.edit', compact('roles','user'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        //
        $request->validate([
            'name'=>'required|max:50:users,name,'.$user->id,
            'email'=>'required|max:50|unique:users,email,'.$user->id,
            ]);
         //dd($request->all());
         $user->update($request->all());
         $user->roles()->sync($request->get('roles'));

         return redirect()->route('user.index')->with('status_success','Usuario Modificado con Exito');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        
        $this->authorize('tieneacceso','Usuario.destroy');
        $user->delete();
        return redirect()->route('user.index')->with('status_success','Usuario Eliminado con Exito');

    }
}
