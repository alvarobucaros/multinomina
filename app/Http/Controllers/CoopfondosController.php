<?php

namespace App\Http\Controllers;

use App\Models\Coopfondos;
use App\Models\Empleados;
use App\Models\Terceros;
use Illuminate\Http\Request;

class CoopfondosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Coopfondos::where('cof_idEmpresa', auth()->user()->empresa)
        ->join('empleados','empleados.id','=','coopfondos.cof_idEmpleado')
        ->join('terceros','terceros.id','=','coopfondos.cof_idTercero')
         
        ->select('empl_primerNombre', 'empl_otroNombre', 'empl_primerApellido', 
        'empl_otroApellido','ter_nombre', 'coopfondos.id','cof_idEmpresa','cof_idEmpleado',
        'cof_idTercero','cof_valorTotal','cof_valorCuota','cof_saldo','col_plazo',
        'cof_fechaInicio','cof_fechaFinal','cof_periDescuento')   

        ->where('empl_estado', '=', 'A')
        ->orderBy('empl_primerApellido')
        ->orderBy('empl_primerNombre')
        ->orderBy('cof_fechaInicio')
        ->orderBy('ter_nombre')
        ->paginate(8); 
        return view('coopfondos/index', compact('datos'));  
    }

    /**
     * Show the form for creating a new resource.
     */ 
    public function create()
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->select('empleados.id','empl_primerNombre', 'empl_otroNombre', 'empl_primerApellido', 
        'empl_otroApellido')
        ->where('empl_estado','A')
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get();
      
        $terceros = Terceros::where('ter_idEmpresa', auth()->user()->empresa)
        ->select('terceros.id','ter_nombre')
        ->where('ter_estado','A')
        ->join('tipos_varios','tipos_varios.id','=','terceros.ter_idTipoTercero')
        ->where('tipos_varios.tt_clase','CO')
        ->orderBy("ter_nombre")->get();

        $coopfondos = new Coopfondos();
        $coopfondos-> cof_idEmpresa = auth()->user()->empresa;
        $coopfondos-> cof_valorCuota = 0;
        $coopfondos-> cof_periDescuento='P';

        return view('coopfondos/agregar', compact('coopfondos','empleados','terceros'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coopfondos = new Coopfondos();
        $coopfondos-> cof_idEmpresa= auth()->user()->empresa;
        $coopfondos-> cof_idEmpleado = $request->post('cof_idEmpleado');
        $coopfondos-> cof_idTercero = $request->post('cof_idTercero');
        $coopfondos-> cof_valorTotal = $request->post('cof_valorTotal');
        $coopfondos-> cof_valorCuota = $request->post('cof_valorCuota');
        $coopfondos-> cof_saldo = $request->post('cof_saldo');        
        $coopfondos-> col_plazo = $request->post('col_plazo');
        $coopfondos-> cof_fechaInicio = $request->post('cof_fechaInicio');
        $coopfondos-> cof_fechaFinal = $request->post('cof_fechaFinal');
        $coopfondos-> cof_periDescuento = $request->post('cof_periDescuento');

        $coopfondos->save();
        return redirect()->route("coopfondos")->with("success","Agregado correctamente");

    }

    public function show(string $id)
    {
        $ar = explode('|',$id);
        return view('coopfondos/eliminar', compact('ar'));
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->select('empleados.id','empl_primerNombre', 'empl_otroNombre', 'empl_primerApellido', 
        'empl_otroApellido')
        ->where('empl_estado','A')
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get();
      
        $terceros = Terceros::where('ter_idEmpresa', auth()->user()->empresa)
        ->select('terceros.id','ter_nombre')
        ->where('ter_estado','A')
        ->join('tipos_varios','tipos_varios.id','=','terceros.ter_idTipoTercero')
        ->where('tipos_varios.tt_clase','CO')
        ->orderBy("ter_nombre")->get();

        $coopfondos = Coopfondos::find($id);
        return view('coopfondos/actualizar', compact('coopfondos','empleados','terceros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coopfondos $coopfondos)
    {
        $coopfondos = Coopfondos::find($id); 
        $coopfondos-> cof_idEmpresa= auth()->user()->empresa;
        $coopfondos-> cof_idEmpleado = $request->post('cof_idEmpleado');
        $coopfondos-> cof_idTercero = $request->post('cof_idTercero');
        $coopfondos-> cof_valorTotal = $request->post('cof_valorTotal');
        $coopfondos-> cof_valorCuota = $request->post('cof_valorCuota');
        $coopfondos-> cof_saldo = $request->post('cof_saldo');        
        $coopfondos-> col_plazo = $request->post('col_plazo');
        $coopfondos-> cof_fechaInicio = $request->post('cof_fechaInicio');
        $coopfondos-> cof_fechaFinal = $request->post('cof_fechaFinal');
        $coopfondos-> cof_periDescuento = $request->post('cof_periDescuento');

        $coopfondos->save();
        return redirect()->route("coopfondos")->with("success","Actualizado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coopfondos = Coopfondos::find($id); 
        $coopfondos->delete();
        return redirect()->route("coopfondos")->with("success","Eliminado correctamente");
    }

     public function export (){

     }
}
