<?php

namespace App\Http\Controllers;

use App\Models\Bancos;
use Illuminate\Http\Request;

class BancosController extends Controller
{

    public function index()
    {
        $datos = Bancos::where('ban_idEmpresa', auth()->user()->empresa)
        ->orderBy('ban_nombre')
        ->paginate(8);      
        return view('bancos/index', compact('datos'));  
    }

 
    public function create()
    {
        $bancos = new Bancos();
        $bancos->ban_idEmpresa = auth()->user()->empresa;
        return view('bancos/agregar', compact('bancos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bancos = new Bancos();
        $bancos->ban_idEmpresa= auth()->user()->empresa;
        $bancos->ban_nombre = $request->post('ban_nombre');
        $bancos->ban_codigo = $request->post('ban_codigo');
        $bancos->save();
        return redirect()->route("bancos")->with("success","Agregado correctamente");
    }

    public function show(string $id)
    {
        $bancos = Bancos::find($id);
        return view('bancos/eliminar', compact('bancos'));
    }

    public function edit(string $id)
    {

        $bancos = Bancos::find($id);
        return view('bancos/actualizar', compact('bancos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bancos $bancos)
    {
        $bancos = new Bancos();
        $bancos->ban_idEmpresa= auth()->user()->empresa;
        $bancos->ban_nombre = $request->post('ban_nombre');
        $bancos->ban_codigo = $request->post('ban_codigo');
        $bancos->save();
        return redirect()->route("bancos")->with("success","Actualizado correctamente");
    }

    public function destroy(string $id)
    {
        $bancos = Bancos::find($id); 
        $bancos->delete();
        return redirect()->route("bancos")->with("success","Eliminado correctamente");
    }
    
     public function export (){
        return Excel::download(new BancosExport, 'bancos.xlsx');
     }

     public function cargaxls()
     {
         return view('bancos/cargaxls');
    }

}
