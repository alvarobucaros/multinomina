<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TiposVarios;

class TiposVariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = TiposVarios::where('tt_idEmpresa', auth()->user()->empresa)
        ->orderBy('tt_clase')
        ->orderBy('tt_codigo', 'asc')
        ->paginate(8);
  
        return view('TiposVarios/index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposvarios = new TiposVarios();
        $tiposvarios->tt_idEmpresa = auth()->user()->empresa;
        $tiposvarios->tt_estado = 'A';
      
        return view('TiposVarios/agregar', compact('tiposvarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tiposvarios = new TiposVarios();
        $tiposvarios->tt_idEmpresa= auth()->user()->empresa;
        $tiposvarios->tt_codigo = $request->post('tt_codigo');
        $tiposvarios->tt_descripcion = $request->post('tt_descripcion');
        $tiposvarios->tt_estado = $request->post('tt_estado');
        $tiposvarios->tt_clase = $request->post('tt_clase');
        $tiposvarios->save();
        return redirect()->route("tiposvarios")->with("success","Agregado correctamente");
    }

    /**
     * Display the specified resource.  
     */
    public function show(string $id)
    {
        $tiposvarios = TiposVarios::find($id);
        return view('TiposVarios/eliminar', compact('tiposvarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tiposvarios = TiposVarios::find($id);
        return view('TiposVarios/actualizar', compact('tiposvarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tiposvarios = TiposVarios::find($id); 
        $tiposvarios->tt_idEmpresa= auth()->user()->empresa;
        $tiposvarios->tt_codigo = $request->post('tt_codigo');
        $tiposvarios->tt_descripcion = $request->post('tt_descripcion');
        $tiposvarios->tt_estado = $request->post('tt_estado');
        $tiposvarios->tt_clase = $request->post('tt_clase');
        $tiposvarios->save();
        return redirect()->route("tiposvarios")->with("success","Actualizado correctamente");
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tiposvarios = TiposVarios::find($id); 
        $tiposvarios->delete();
        return redirect()->route("tiposvarios")->with("success","Eliminado correctamente");
 
    }
    public function export (){

    }
}
