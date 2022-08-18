<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('tieneacceso','categoria.index');
  
        $cates =Categoria::orderBy('id','Desc')->paginate(2);
        return view('categoria.index', compact('cates'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('tieneacceso','cateogira.create');
  
        return view('categoria.create');
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
        $request->validate([
            'nombre'=>'required|max:50|unique:categorias,nombre',
            'descripcion'=>'required',
            ]);
       $rol =Categoria::create($request->all());
            return redirect()->route('categoria.index')->with('status_success','Categoria Creada con Exito');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->authorize('tieneacceso','rol.edit');
        $cate=Categoria::find($id);
       // return ($cate);
       return view('categoria.edit', compact('cate'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        
        $this->authorize('tieneacceso','rol.edit');
 
        $request->validate([
          'nombre'=>'required|max:50|unique:categorias,nombre,'.$id,
          'descripcion'=>'required',
          ]);
          $cat=Categoria::find($id);
          $cat->update($request->all());
    return redirect()->route('categoria.index')->with('status_success','Categoria Modificada con Exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->authorize('tieneacceso','rol.destroy');
        $categoria= Categoria::find($id); 
        $categoria->delete();
        return redirect()->route('categoria.index')->with('status_success','Categoria Eliminada con Exito');
    
    }
}
