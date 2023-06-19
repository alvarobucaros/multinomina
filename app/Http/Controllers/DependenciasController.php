<?php

namespace App\Http\Controllers;

use App\Models\Dependencias;
use Illuminate\Http\Request;

class DependenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Dependencias::where('dep_idEmpresa', auth()->user()->empresa)
        ->orderBy('dep_nombre', 'asc')
        ->paginate(8);      
        return view('dependencias/index', compact('datos')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dependencias = new Dependencias();
        $dependencias->dep_idEmpresa = auth()->user()->empresa;
        $dependencias->dep_estado = 'A';
        return view('dependencias/agregar', compact('dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dependencias = new Dependencias();
        $dependencias->dep_idEmpresa= auth()->user()->empresa;
        $dependencias->dep_nombre = $request->post('dep_nombre');
        $dependencias->dep_estado = $request->post('dep_estado');
        $dependencias->save();
        return redirect()->route("dependencias")->with("success","Agregado correctamente");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dependencias = Dependencias::find($id);
        return view('dependencias/eliminar', compact('dependencias'));
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dependencias = Dependencias::find($id);
        return view('dependencias/actualizar', compact('dependencias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dependencias $dependencias)
    {
        $dependencias = Dependencias::find($id); 
        $dependencias->dep_idEmpresa= auth()->user()->empresa;
        $dependencias->dep_nombre = $request->post('dep_nombre');
        $dependencias->dep_estado = $request->post('dep_estado');
        $dependencias->save();
        return redirect()->route("dependencias")->with("success","Actualizado correctamente");
     }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
        $dependencias = Dependencias::find($id); 
        $dependencias->delete();
        return redirect()->route("dependencias")->with("success","Eliminado correctamente");
    }

    public function export (){

    }
    public function import (){
     
    }
}
