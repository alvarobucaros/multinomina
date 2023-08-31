<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bancos;
use App\Models\Cargos;
use App\Models\Dependencias;
use App\Models\Empleados;
use App\Models\Ingresos;
use App\Models\Terceros;

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terceros = Terceros::where('ter_idEmpresa', auth()->user()->empresa)
        ->select('id','ter_tipoTercero', 'ter_nombre')
        ->where('ter_estado','A')
        ->whereIn('ter_tipoTercero',['A','E','P'])
        ->orderBy("ter_tipoTercero")
        ->orderBy("ter_nombre")->get();

        $datos = Ingresos::where('ing_idEmpresa', auth()->user()->empresa)
        ->join('empleados','empleados.id','=','ingresos.ing_idEmpleado')
        ->join('cargos','cargos.id','=','ingresos.ing_idCargo')
        ->join('dependencias','dependencias.id','=','ingresos.ing_idDependencia')
        ->select('ingresos.id' ,  'ing_idEmpleado' , 'ing_fechaIngreso' , 
        'ing_fechaRetiro' , 'ing_idCargo' , 'ing_idDependencia' , 'ing_tipoCtaBco',
        'ing_porcARL' , 'ing_EPS' , 'ing_AFP' , 'ing_encargo' , 'ing_estado' , 'ing_porcRetefuente',
        'ing_idCargoEncargo' ,'ing_numeroContrato', 'empl_primerNombre', 
        'empl_otroNombre', 'empl_primerApellido', 'empl_otroApellido',
        'dep_nombre', 'car_nombre', 'car_salario')
        ->where('empl_estado', '=', 'A')
        ->where('car_estado', '=', 'A')
        ->where('dep_estado', '=', 'A')     
        ->orderBy('empl_primerNombre', 'asc', 'empl_otroNombre', 'asc',
        'empl_primerApellido', 'asc','empl_otroApellido','asc')
        ->paginate(8);      
        return view('ingresos/index', compact('datos','terceros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->where('empl_estado','A')
        ->whereNOTIn('empleados.id',function($query){
            $query->select('ing_idEmpleado')->from('ingresos')
                  ->where('ing_idEmpresa',auth()->user()->empresa);
         })
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get(['empleados.id', 'empl_primerApellido', 'empl_otroApellido', 
        'empl_primerNombre', 'empl_otroNombre']);

        $bancos = Bancos::where('ban_idEmpresa', auth()->user()->empresa)
        ->orderBy("ban_nombre")->get('id', 'ban_nombre');

        $cargos = Cargos::where('car_idEmpresa', auth()->user()->empresa)
        ->select('id','car_nombre','car_salario')
        ->where('car_estado','A')
        ->orderBy("car_nombre")->get();
 
        $dependencias = Dependencias::where('dep_idEmpresa', auth()->user()->empresa)
        ->select('id','dep_nombre')
        ->where('dep_estado','A')
        ->orderBy("dep_nombre")->get();

        $terceros = Terceros::where('ter_idEmpresa', auth()->user()->empresa)
        ->select('id','ter_tipoTercero', 'ter_nombre')
        ->where('ter_estado','A')
        ->whereIn('ter_tipoTercero',['R','E','P'])
        ->orderBy("ter_tipoTercero")
        ->orderBy("ter_nombre")->get();

        $ingresos = new Ingresos();
        $ingresos->ing_idEmpresa = auth()->user()->empresa;
        $ingresos->ing_encargo = 'N';
        $ingresos->ing_estado = 'A';
        $ingresos->ing_tipoCtaBco = 'A';
        $ingresos->ing_porcRetefuente = 0;
        $ingresos->ing_deduccionSalud = 0;
        $ingresos->ing_deduccionVivienda = 0;
        $ingresos->ing_deduccionAFC = 0;
        $ingresos->ing_deduccionDependiente = 0;
           
        return view('ingresos/agregar',
        compact('ingresos','empleados', 'cargos', 'dependencias','terceros', 'bancos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ingresos = new Ingresos();
        $ar = explode("|",$request->post('ing_idCargo'));
        $ingresos->ing_idEmpresa= auth()->user()->empresa;
        $ingresos->ing_idEmpleado = $request->post('ing_idEmpleado');
        $ingresos->ing_fechaIngreso = $request->post('ing_fechaIngreso');
        $ingresos->ing_fechaRetiro = $request->post('ing_fechaRetiro');
        $ingresos->ing_idCargo = $ar[0];
        $ingresos->ing_idDependencia = $request->post('ing_idDependencia');        
        $ingresos->ing_porcARL = $request->post('ing_porcARL');
        $ingresos->ing_EPS = $request->post('ing_EPS');
        $ingresos->ing_AFP = $request->post('ing_AFP');
        $ingresos->ing_ARL = $request->post('ing_ARL');
        $ingresos->ing_estado = $request->post('ing_estado');
        $ingresos->ing_encargo = $request->post('ing_encargo');
        $ingresos->ing_numeroContrato = $request->post('ing_numeroContrato');
        $ingresos->ing_idCargoEncargo = $request->post('ing_idCargoEncargo');
        $ingresos->ing_fchUltimaVacacion = $request->post('ing_fechaIngreso');
        $ingresos->ing_fchUltimaCesantia = $request->post('ing_fechaIngreso');
        $ingresos->ing_banco  = $request->post('ing_banco');
        $ingresos->ing_cuenta = $request->post('ing_cuenta');
        $ingresos->ing_salario = $request->post('ing_salario');
        $ingresos->ing_porcRetefuente = $request->post('ing_porcRetefuente');
        $ingresos->ing_tipoCtaBco = $request->post('ing_tipoCtaBco');
        $ingresos->ing_deduccionSalud = $request->post('ing_deduccionSalud');
        $ingresos->ing_deduccionVivienda = $request->post('ing_deduccionVivienda');
        $ingresos->ing_deduccionAFC = $request->post('ing_deduccionAFC');
        $ingresos->ing_deduccionDependiente = $request->post('ing_deduccionDependiente');
        $ingresos->save();
        return redirect()->route("ingresos")->with("success","Agregado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar = explode('|',$id);
        return view('ingresos/eliminar', compact('ar'));
    }

    public function edit(string $id)
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->where('empl_estado','A')
        ->whereNOTIn('empleados.id',function($query){
            $query->select('ing_idEmpleado')->from('ingresos')
                  ->where('ing_idEmpresa',auth()->user()->empresa);
         })
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get(['empleados.id', 'empl_primerApellido', 'empl_otroApellido', 
        'empl_primerNombre', 'empl_otroNombre']);

        $bancos = Bancos::where('ban_idEmpresa', auth()->user()->empresa)
        ->orderBy("ban_nombre")->get('id', 'ban_nombre');

        $cargos = Cargos::where('car_idEmpresa', auth()->user()->empresa)
        ->select('id','car_nombre','car_salario')
        ->where('car_estado','A')
        ->orderBy("car_nombre")->get();
 
        $dependencias = Dependencias::where('dep_idEmpresa', auth()->user()->empresa)
        ->select('id','dep_nombre')
        ->where('dep_estado','A')
        ->orderBy("dep_nombre")->get();

        $terceros = Terceros::where('ter_idEmpresa', auth()->user()->empresa)
        ->select('id','ter_tipoTercero', 'ter_nombre')
        ->where('ter_estado','A')
        ->whereIn('ter_tipoTercero',['R','E','P'])
        ->orderBy("ter_tipoTercero")
        ->orderBy("ter_nombre")->get();

        $ingresos = Ingresos::find($id);
        return view('ingresos/actualizar',
        compact('ingresos','empleados', 'cargos', 'dependencias','terceros', 'bancos'));
 
    }

    public function ver(string $id)
    {
        $terceros = Terceros::where('ter_idEmpresa', auth()->user()->empresa)
        ->select('id','ter_tipoTercero', 'ter_nombre')
        ->where('ter_estado','A')
        ->whereIn('ter_tipoTercero',['A','E','P'])
        ->orderBy("ter_tipoTercero")
        ->orderBy("ter_nombre")->get();

        $ingresos = Ingresos::find($id)
       
        ->join('empleados','empleados.id','=','ingresos.ing_idEmpleado')
        ->join('cargos','cargos.id','=','ingresos.ing_idCargo')
        ->join('dependencias','dependencias.id','=','ingresos.ing_idDependencia')
        ->select('ingresos.id' ,  'ing_idEmpleado' , 'ing_fechaIngreso' , 
        'ing_fechaRetiro' , 'ing_idCargo' , 'ing_idDependencia' , 
        'ing_porcARL' , 'ing_EPS' , 'ing_AFP' , 'ing_encargo' , 'ing_estado' , 
        'ing_porcRetefuente',  'ing_deduccionSalud', 'ing_deduccionVivienda',
         'ing_deduccionAFC', 'ing_deduccionDependiente',
        'ing_idCargoEncargo' ,'ing_numeroContrato', 'empl_primerNombre', 
        'empl_otroNombre', 'empl_primerApellido', 'empl_otroApellido',
        'dep_nombre', 'car_nombre', 'car_salario')
        ->where('empl_estado', '=', 'A')
        ->where('car_estado', '=', 'A')
        ->where('dep_estado', '=', 'A')     
        ->orderBy('empl_primerNombre', 'asc', 'empl_otroNombre', 'asc',
        'empl_primerApellido', 'asc','empl_otroApellido','asc')
        ->paginate(8);      
        return view('ingresos/ver', compact('ingresos','terceros'));

    }


    public function update(Request $request, string $id)
    {
        $ingresos = Ingresos::find($id); 
        $ingresos->ing_idEmpresa= auth()->user()->empresa;
        $ingresos->ing_idEmpleado = $request->post('ing_idEmpleado');
        $ingresos->ing_fechaIngreso = $request->post('ing_fechaIngreso');
        $ingresos->ing_fechaRetiro = $request->post('ing_fechaRetiro');
        $ingresos->ing_idCargo = $request->post('ing_idCargo');
        $ingresos->ing_idDependencia = $request->post('ing_idDependencia');        
        $ingresos->ing_porcARL = $request->post('ing_porcARL');
        $ingresos->ing_EPS = $request->post('ing_EPS');
        $ingresos->ing_AFP = $request->post('ing_AFP');
        $ingresos->ing_ARL = $request->post('ing_ARL');
        $ingresos->ing_estado = $request->post('ing_estado');
        $ingresos->ing_encargo = $request->post('ing_encargo');
        $ingresos->ing_numeroContrato = $request->post('ing_numeroContrato');
        $ingresos->ing_idCargoEncargo = $request->post('ing_idCargoEncargo');
        $ingresos->ing_fchUltimaVacacion = $request->post('ing_fchUltimaVacacion');
        $ingresos->ing_fchUltimaCesantia = $request->post('ing_fchUltimaCesantia');
        $ingresos->ing_banco  = $request->post('ing_banco');
        $ingresos->ing_cuenta = $request->post('ing_cuenta');
        $ingresos->ing_tipoCtaBco = $request->post('ing_tipoCtaBco');
        $ingresos->ing_salario = $request->post('ing_salario');
        $ingresos->ing_porcRetefuente = $request->post('ing_porcRetefuente');
        $ingresos->ing_deduccionSalud = $request->post('ing_deduccionSalud');
        $ingresos->ing_deduccionVivienda = $request->post('ing_deduccionVivienda');
        $ingresos->ing_deduccionAFC = $request->post('ing_deduccionAFC');
        $ingresos->ing_deduccionDependiente = $request->post('ing_deduccionDependiente');
           
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
