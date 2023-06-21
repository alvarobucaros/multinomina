<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ingresos;
use App\Models\TiposVarios;
use App\Models\Empleados;
use App\Models\Cargos;
use App\Models\Dependencias;

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = TiposVarios::where('tt_idEmpresa', auth()->user()->empresa)
        ->select('id','tt_clase', 'tt_codigo')
        ->where('tt_estado','A')
        ->whereIn('tt_clase',['AF','EP','FP'])
        ->orderBy("tt_clase")
        ->orderBy("tt_codigo")->get();

        $datos = Ingresos::where('ing_idEmpresa', auth()->user()->empresa)
        ->join('empleados','empleados.id','=','ingresos.ing_idEmpleado')
        ->join('cargos','cargos.id','=','ingresos.ing_idCargo')
        ->join('dependencias','dependencias.id','=','ingresos.ing_idDependencia')
        ->select('ingresos.id' ,  'ing_idEmpleado' , 'ing_fechaIngreso' , 
        'ing_fechaRetiro' , 'ing_idCargo' , 'ing_idDependencia' , 
        'ing_porcARL' , 'ing_EPS' , 'ing_AFP' , 'ing_encargo' , 'ing_estado' ,
        'ing_idCargoEncargo' ,'ing_numeroContrato', 'empl_primerNombre', 
        'empl_otroNombre', 'empl_primerApellido', 'empl_otroApellido',
        'dep_nombre', 'car_nombre', 'car_salario')
        ->where('empl_estado', '=', 'A')
        ->where('car_estado', '=', 'A')
        ->where('dep_estado', '=', 'A')     
        ->orderBy('empl_primerNombre', 'asc', 'empl_otroNombre', 'asc',
        'empl_primerApellido', 'asc','empl_otroApellido','asc')
        ->paginate(8);      
        return view('ingresos/index', compact('datos','tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->where('empl_estado','A')
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get();

        $cargos = Cargos::where('car_idEmpresa', auth()->user()->empresa)
        ->select('id','car_nombre','car_salario')
        ->where('car_estado','A')
        ->orderBy("car_nombre")->get();
 
        $dependencias = Dependencias::where('dep_idEmpresa', auth()->user()->empresa)
        ->select('id','dep_nombre')
        ->where('dep_estado','A')
        ->orderBy("dep_nombre")->get();

        $tipos = TiposVarios::where('tt_idEmpresa', auth()->user()->empresa)
        ->select('id','tt_clase', 'tt_codigo')
        ->where('tt_estado','A')
        ->whereIn('tt_clase',['AF','EP','FP'])
        ->orderBy("tt_clase")
        ->orderBy("tt_codigo")->get();
            
        $ingresos = new Ingresos();
        $ingresos->ing_idEmpresa = auth()->user()->empresa;
        $ingresos->ing_encargo = 'N';
        $ingresos->ing_estado = 'A';
        return view('ingresos/agregar',
        compact('ingresos','empleados', 'cargos', 'dependencias','tipos'));
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
