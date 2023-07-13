<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empresas;
use App\Models\Empleados;
use App\Models\Parametros;
use App\Models\TiposVarios;
use App\Models\Liquidaciones;

class LiquidacionesController extends Controller
{

    public function index()
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->select('empleados.id','empl_primerNombre', 'empl_otroNombre', 'empl_primerApellido', 
        'empl_otroApellido')
        ->join('ingresos','ingresos.ing_idEmpleado','=','empleados.id')
        ->where('empl_estado','A')
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get();

        $tipos = TiposVarios::where('tt_idEmpresa', auth()->user()->empresa)
        ->where('tt_clase','LQ')
        ->where('tt_estado','A')       
        ->orderBy('tt_codigo')->get();
     //   dd($tipos);
        return view('liquidaciones/index', compact('tipos','empleados')); 
    }

    public function traeLiq(Request $request)
    {
      
        $parametros = Parametros::all()->where('par_idEmpresa', auth()->user()->empresa);
      
        $datos = Liquidaciones::all()->where('liq_idEmpresa', auth()->user()->empresa)
        ->where('liq_tipo','=',$request->get('lq'));
        return view('liquidaciones/actualizar', compact('datos', 'parametros')); 
    }
  
    public function create(string $id)
    {
        $liquidaciones = new Liquidaciones();
        $ar = explode('|',$id);
        $param[] = $ar[0];

        $parametros = DB::table('parametros')
        ->where('par_idEmpresa', (auth()->user()->empresa))
        ->selectRaw('parametros.*')
        ->get();

        $periodo = $parametros[0]->par_periodo;
   
        if($ar[0] == 'LP'){
           $liquidaciones->liq_fechaDesde = substr($periodo,0,4).'-'.substr($periodo,4,6).'-01';
           $liquidaciones->liq_fechaHasta = substr($periodo,0,4).'-'.substr($periodo,4,6).'-30';
           $liquidaciones->liq_idEmpresa= auth()->user()->empresa;
           $liquidaciones->liq_tipo = $ar[0];
           $liquidaciones->liq_periodo = $periodo;
           $liquidaciones->liq_idEmpleado = 0;
           $liquidaciones->liq_estado = 'P';
           $liquidaciones->save();
           return redirect()->route('/traeLiq/',$ar[0])->with("success","Agregado correctamente");
        }
        else{
        return view('home/desarrollo',$param);
        }
    }

    public function liquida(string $id)
    {
        $ar = explode('|',$id);
        $param[] = $ar[0];
        return view('home/desarrollo',$param);
    }

    public function verLiquidacion(string $id)
    {
        $ar = explode('|',$id);
        $param[] = $ar[0];
        return view('home/desarrollo', $param);
    }

    public function store(Request $request)
    {
        return view('home/desa/$request');
    }

  
    public function show(Liquidaciones $liquidaciones)
    {
        return view('home/desarrollo');
    }

    public function edit(Request $request)
    {
        $id = $request->post('liq_idEmpleado');
        $tt = $request->post('tt_codigo');


        $tiposVarios = DB::table('tipos_varios')
        ->where('tt_idEmpresa', (auth()->user()->empresa))
        ->where('tt_clase','LQ')
        ->where('tt_codigo',$tt)
        ->selectRaw('tipos_varios.*')
        ->get();

        $parametros = DB::table('parametros')
        ->where('par_idEmpresa', (auth()->user()->empresa))
        ->selectRaw('parametros.*')
        ->get();

        $empleados = DB::table('empleados')
        ->where('empl_idEmpresa', (auth()->user()->empresa))
        ->where('empleados.id',$id)
        ->selectRaw('empleados.*')
        ->get();
       
        $liquidaciones = Liquidaciones::where('liq_idEmpresa', auth()->user()->empresa)
        ->where('liq_tipo',$tt)
        ->select('liq_tipo', 'liq_fechaDesde', 'liq_fechaHasta', 'liq_idEmpleado', 'liq_periodo', 'liq_estado');

        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->where('empleados.id',$id)->get();
       
        return view('liquidaciones/form', compact('liquidaciones', 'parametros',  'empleados', 'tiposVarios' ));
     
    }

    public function update(string $id)
    {
        $ar = explode('|',$id);
        $nombre[] = $ar[1];
        $datos = Liquidaciones::all()->where('liq_idEmpresa', auth()->user()->empresa)
        ->where('liq_tipo','=',$ar[0]);
       // dd($datos);
        return view('liquidaciones/traeLiq', compact('datos','ar')); 
    }

 
    public function destroy(Liquidaciones $liquidaciones)
    {
        //
    }
}
