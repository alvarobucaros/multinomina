<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Terceros;
use App\Models\Bancos;

class TercerosController extends Controller
{
 
    public function index()
    {
        $datos = Terceros::where('ter_idEmpresa', auth()->user()->empresa)
        ->join('bancos','bancos.id','=','ter_idBanco')
        ->orderBy('ter_nombre')  
        ->select('terceros.id','ter_idEmpresa','ter_tipoTercero', 'ter_nombre','ter_direccion','ter_ciudad', 'ter_email', 'ter_tipoDoc',
        'ter_nroDoc', 'ter_telefono', 'ter_estado','ter_ctaBanco', 'ter_idBanco', 'ter_tipoCtaBanco', 'ban_idEmpresa', 
        'ban_codigo','ban_nombre') 
        ->paginate(8); 

        return view('terceros/index', compact('datos'));
    }

    public function create()
    {
        $bancos = Bancos::where('ban_idEmpresa', auth()->user()->empresa)
        ->orderBy('ban_nombre')->get();
        $terceros = new Terceros();
        $terceros->ter_idEmpresa = auth()->user()->empresa;
        $terceros->ter_estado = 'A';
        $terceros->ter_tipoDoc = 'N';        
        return view('terceros/agregar', compact('terceros', 'bancos'));
    }

    public function store(Request $request)
    {
        $terceros = new Terceros();
        $terceros->ter_idEmpresa= auth()->user()->empresa;
        $terceros->ter_tipoTercero = $request->post('ter_tipoTercero');
        $terceros->ter_nombre = $request->post('ter_nombre');
        $terceros->ter_direccion = $request->post('ter_direccion');
        $terceros->ter_ciudad = $request->post('ter_ciudad');
        $terceros->ter_email = $request->post('ter_email');        
        $terceros->ter_tipoDoc = $request->post('ter_tipoDoc');
        $terceros->ter_nroDoc = $request->post('ter_nroDoc');
        $terceros->ter_telefono = $request->post('ter_telefono');
        $terceros->ter_estado = $request->post('ter_estado');          
        $terceros->ter_ctaBanco = $request->post('ter_ctaBanco');
        $terceros->ter_idBanco = $request->post('ter_idBanco');
        $terceros->ter_tipoCtaBanco = $request->post('ter_tipoCtaBanco');

        $terceros->save();
        return redirect()->route("terceros")->with("success","Agregado correctamente");

    }

    public function show(string $id)
    {
        $terceros = Terceros::find($id);
        return view('terceros/eliminar', compact('terceros'));
    }

    public function edit(string $id)
    {
        $bancos = Bancos::where('ban_idEmpresa', auth()->user()->empresa)
        ->orderBy('ban_nombre')->get();

        $terceros = Terceros::find($id);
        return view('terceros/actualizar', compact('terceros', 'bancos'));
    }

    public function update(Request $request, string $id)
    {
        $terceros = Terceros::find($id); 
        $terceros->ter_idEmpresa= auth()->user()->empresa;
        $terceros->ter_tipoTercero = $request->post('ter_tipoTercero');
        $terceros->ter_nombre = $request->post('ter_nombre');
        $terceros->ter_direccion = $request->post('ter_direccion');
        $terceros->ter_ciudad = $request->post('ter_ciudad');
        $terceros->ter_email = $request->post('ter_email');        
        $terceros->ter_tipoDoc = $request->post('ter_tipoDoc');
        $terceros->ter_nroDoc = $request->post('ter_nroDoc');
        $terceros->ter_telefono = $request->post('ter_telefono');
        $terceros->ter_estado = $request->post('ter_estado');
        $terceros->ter_ctaBanco = $request->post('ter_ctaBanco');
        $terceros->ter_idBanco = $request->post('ter_idBanco');
        $terceros->ter_tipoCtaBanco = $request->post('ter_tipoCtaBanco');
        $terceros->save();
        return redirect()->route("terceros")->with("success","Actualizado correctamente");
    }


    public function destroy(string $id)
    {
        $terceros = Terceros::find($id); 
        $terceros->delete();
        return redirect()->route("terceros")->with("success","Eliminado correctamente");
    }

     public function export (){

     }
}
