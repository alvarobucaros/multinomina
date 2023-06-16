<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Terceros;
use App\Models\TiposVarios;

class TercerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Terceros::where('ter_idEmpresa', auth()->user()->empresa)
        ->join('tipos_varios','tipos_varios.id','=','terceros.ter_idTipoTercero')
        ->orderBy('ter_idTipoTercero')
        ->orderBy('ter_nombre')
        ->paginate(8);
  
        return view('terceros/index', compact('datos'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $terceros = new Terceros();
        $terceros->ter_idEmpresa = auth()->user()->empresa;
        $terceros->ter_estado = 'A';
        $terceros->ter_idTiter_tipoDocpoTercero='N';
        
        $tipos = TiposVarios::where('tt_idEmpresa', auth()->user()->empresa)
        ->orderBy('tt_clase', 'desc')
        ->orderBy('tt_codigo', 'asc');
        return view('terceros/agregar', compact('terceros', 'tipos'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $terceros = new Terceros();
        $terceros->ter_idEmpresa= auth()->user()->empresa;
        $terceros->ter_idTipoTercero = $request->post('ter_idTipoTercero');
        $terceros->ter_nombre = $request->post('ter_nombre');
        $terceros->ter_direccion = $request->post('ter_direccion');
        $terceros->ter_ciudad = $request->post('ter_ciudad');
        $terceros->ter_email = $request->post('ter_email');        
        $terceros->ter_tipoDoc = $request->post('ter_tipoDoc');
        $terceros->ter_nroDoc = $request->post('ter_nroDoc');
        $terceros->ter_telefono = $request->post('ter_telefono');
        $terceros->ter_estado = $request->post('ter_estado');
        $terceros->save();
        return redirect()->route("terceros")->with("success","Agregado correctamente");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $terceros = Terceros::find($id);
        return view('terceros/eliminar', compact('terceros'));
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $terceros = Terceros::find($id);
        return view('terceros/actualizar', compact('terceros'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $terceros = Terceros::find($id); 
        $terceros->ter_idEmpresa= auth()->user()->empresa;
        $terceros->ter_idTipoTercero = $request->post('ter_idTipoTercero');
        $terceros->ter_nombre = $request->post('ter_nombre');
        $terceros->ter_direccion = $request->post('ter_direccion');
        $terceros->ter_ciudad = $request->post('ter_ciudad');
        $terceros->ter_email = $request->post('ter_email');        
        $terceros->ter_tipoDoc = $request->post('ter_tipoDoc');
        $terceros->ter_nroDoc = $request->post('ter_nroDoc');
        $terceros->ter_telefono = $request->post('ter_telefono');
        $terceros->ter_estado = $request->post('ter_estado');
        $terceros->save();
        return redirect()->route("terceros")->with("success","Actualizado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $terceros = Terceros::find($id); 
        $terceros->delete();
        return redirect()->route("terceros")->with("success","Eliminado correctamente");
    }

     public function export (){

     }
}
