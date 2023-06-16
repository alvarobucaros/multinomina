<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ingresos;

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Ingresos::where('ing_idEmpresa', auth()->user()->empresa)
        ->orderBy('ing_tipo', 'asc', 'ing_titulo', 'asc')
        ->paginate(8);      
        return view('ingresos/index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingresos = new Ingresos();
        $ingresos->ing_idEmpresa = auth()->user()->empresa;
        return view('ingresos/agregar', compact('ingresos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ingresos = new Ingresos();
   
        $ingresos->ing_idEmpresa= auth()->user()->empresa;
        $ingresos->ing_idEmpleado = $request->post('ing_idEmpleado');
        $ingresos->ing_fechaIngreso = $request->post('ing_fechaIngreso');
        $ingresos->ing_fechaRetiro = $request->post('ing_fechaRetiro');

        $ingresos->ing_idCargo = $request->post('ing_idCargo');
        $ingresos->ing_idDependencia = $request->post('ing_idDependencia');        
        $ingresos->ing_porcARL = $request->post('ing_porcARL');

        $ingresos->ing_EPS = $request->post('ing_EPS');
        $ingresos->ing_AFP = $request->post('ing_AFP');

        $ingresos->ing_EPS = $request->post('ing_encargo');
        $ingresos->ing_AFP = $request->post('ing_idCargoEncargo');
        $ingresos->save();
        return redirect()->route("ingresos")->with("success","Agregado correctamente");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ingresos = Ingresos::find($id);
        return view('ingresos/eliminar', compact('ingresos'));
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ingresos = Ingresos::find($id);
        return view('ingresos/actualizar', compact('ingresos'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ingresos = Ingresos::find($id); 
        $ingresos->ing_idEmpresa= auth()->user()->empresa;

        $ingresos->save();
        return redirect()->route("ingresos")->with("success","Actualizado correctamente");
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingresos = Ingresos::find($id); 
        $ingresos->delete();
        return redirect()->route("ingresos")->with("success","Eliminado correctamente");
    }

     public function export (){

     }
}
