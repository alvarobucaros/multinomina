<?php

namespace App\Http\Controllers;

use App\Models\Vacaciones;
use App\Models\Empleados;
use Illuminate\Http\Request;

class VacacionesController extends Controller
{

    public function index()
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->join('ingresos','ingresos.ing_idEmpleado','=','empleados.id')
        ->where('empl_estado','A')
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get();
        return view('vacaciones/index', compact('empleados')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vacaciones = new Vacaciones();
        $vacaciones->vac_idEmpresa = auth()->user()->empresa;
        $vacaciones->vac_estado = 'A';

        return view('vacaciones/agregar', compact('vacaciones'));
        //return view('vacaciones/index', compact('empleados')); 
        // id, vac_idEmpresa,  vac_idEmpleado, vac_idLiquidacion, vac_fechaInicio, vac_fechaFinal, vac_estado
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    public function show(vacaciones $id)
    {
        $vacaciones = Vacaciones::find($id);
        return view('vacaciones/form', compact('vacaciones'));
    }

    public function edit(Request $request)
    
    {
        $id = $request->post('vac_idEmpleado');
        $datos = Vacaciones::where('vac_idEmpresa', auth()->user()->empresa)
        ->where('vacaciones.id',$id)
        ->orderBy('vac_fechaInicio', 'asc');
    
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->join('ingresos','ingresos.ing_idEmpleado','=','empleados.id')
        ->where('ingresos.id',$id)->get();
       
        return view('vacaciones/form', compact('datos', 'empleados' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vacaciones $vacaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vacaciones $vacaciones)
    {
        //
    }
}
