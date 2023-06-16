<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use App\Models\TiposVarios;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $datos = Cargos::where('car_idEmpresa', auth()->user()->empresa)
        ->orderBy('car_nombre', 'asc')
        ->paginate(8);      
        return view('cargos/index', compact('datos'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TiposVarios::where('tt_idEmpresa', auth()->user()->empresa)
        ->where('tt_clase','CA')
        ->orderBy("tt_codigo")->get();

        $cargos = new Cargos();
        $cargos->car_idEmpresa = auth()->user()->empresa;
        $cargos->car_estado = 'A';
        $cargos->car_otrosFactores='N';
        $cargos->car_tipo = 0;
        $cargos->car_nroOcupados=0;
        $cargos->car_nroVacantes = 0;
        $cargos->car_salario = 0;
        return view('cargos/agregar', compact('cargos', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(Request $request)
    {
        $cargos = new Cargos();
        $cargos->car_idEmpresa= auth()->user()->empresa;
        $cargos->car_nombre = $request->post('car_nombre');
        $cargos->car_nroOcupados = $request->post('car_nroOcupados');
        $cargos->car_nroVacantes = $request->post('car_nroVacantes');
        $cargos->car_otrosFactores = $request->post('car_otrosFactores');
        $cargos->car_tipo = $request->post('car_tipo');
        $cargos->car_estado = $request->post('car_estado');
        $cargos->car_salario = $request->post('car_salario');
        $cargos->save();
        return redirect()->route("cargos")->with("success","Agregado correctamente");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cargos = Cargos::find($id);
        return view('cargos/eliminar', compact('cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipos = TiposVarios::where('tt_idEmpresa', auth()->user()->empresa)
        ->where('tt_clase','CA')
        ->orderBy("tt_codigo")->get();

        $cargos = Cargos::find($id);
        return view('cargos/actualizar', compact('cargos','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cargos = Cargos::find($id); 
        $cargos->car_idEmpresa= auth()->user()->empresa;
        $cargos->car_nombre = $request->post('car_nombre');
        $cargos->car_nroOcupados = $request->post('car_nroOcupados');
        $cargos->car_nroVacantes = $request->post('car_nroVacantes');
        $cargos->car_otrosFactores = $request->post('car_otrosFactores');
        $cargos->car_estado = $request->post('car_estado');
        $cargos->car_tipo = $request->post('car_tipo');
        $cargos->car_salario = $request->post('car_salario');
        $cargos->save();
        return redirect()->route("cargos")->with("success","Actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cargos = Cargos::find($id); 
        $cargos->delete();
        return redirect()->route("cargos")->with("success","Eliminado correctamente");
    }

     public function export (){

     }
}
