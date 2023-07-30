<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Acumulados;
use App\Models\Cargos;
use App\Models\Conceptos;
use App\Models\Empresas;
use App\Models\Empleados;
use App\Models\Horas_extras;
use App\Models\Ingresos;
use App\Models\Liquidaciones;
use App\Models\Novedades;
use App\Models\TiposVarios;
use App\Models\Parametros;


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

        $parametros = Parametros::all()->where('par_idEmpresa', auth()->user()->empresa);

        $tipos = TiposVarios::where('tt_idEmpresa', auth()->user()->empresa)
        ->where('tt_clase','LQ')
        ->where('tt_estado','A')       
        ->orderBy('tt_codigo')->get();
     
        return view('liquidaciones/index', compact('tipos','empleados', 'parametros')); 
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
    public function verMovimientos(string $id)
    {
        $datos = Acumulados::where('acu_idEmpresa', auth()->user()->empresa)
        ->join('empleados','empleados.id','=','acumulados.acu_idEmpleado')
        ->join('conceptos','conceptos.id','=','acumulados.acu_idConcepto')
        ->orderBy('empl_primerApellido')
        ->orderBy('empl_primerNombre')
        ->orderBy('acu_idConcepto', 'asc')
        ->paginate(10);      
        return view('liquidaciones/verMovimientos', compact('datos'));  
    }

    // <td>{{$item->}} {{$item->empl_otroNombre}}
    // {{$item->}} {{$item->empl_otroApellido}}</td>

   // public function verliquidaciones(Request $request){
      
    //    $tt_codigo = $request->post('tt_codigo');
    //    $liq_idEmpleado = $request->post('liq_idEmpleado');
    //    $liq_fechaRetiro = $request->post('liq_fechaRetiro');
    //    $par_periodo = $request->post('par_periodo');
    //    $par_fechaDesde = $request->post('par_fechaDesde');
    //    $par_fechaHasta = $request->post('par_fechaHasta');
    //    $verliq = $request->post('verliq');
       
    // //    "tt_codigo" => "LP"
    // //    "liq_idEmpleado" => "0"
    // //    "liq_fechaRetiro" => "2023-01-01"
    // //    "par_periodo" => "202301"  
    // //    "par_fechaDesde" => "2023-01-01"
    // //    "par_fechaHasta" => "2023-01-30"
    // //    "verliq" => "S"

    //    $data = array($tt_codigo, $liq_idEmpleado, $liq_fechaRetiro,  $par_periodo);
    //  if (verliq=='S'){
    //     $datos = Liquidaciones::all()->where('liq_idEmpresa', auth()->user()->empresa)
    //     ->where('liq_tipo','=','tt_codigo'); 
    //   dd($datos);
    //      return view('liquidaciones/verLiquidaciones', compact('datos'));
    // }

   // }

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

    public function liquidar(Request $request)
    {
        $tt_codigo = $request->post('tt_codigo');
        $liq_idEmpleado = $request->post('liq_idEmpleado');
        $liq_fechaRetiro = $request->post('liq_fechaRetiro');
        $par_periodo = $request->post('par_periodo');
        $par_fechaDesde = $request->post('par_fechaDesde');
        $par_fechaHasta = $request->post('par_fechaHasta');
        $verliq = $request->post('verliq');
        $nom_liq = $request->post('nom_liq');
        $borrarliq = $request->post('borrarliq');
        $continua = false;
         
        $data = array($tt_codigo, $liq_idEmpleado, $liq_fechaRetiro,  $par_periodo, $nom_liq);
     //
     // Si se desea ver las liquidaciones
     //   
      if ($verliq=='S'){
        $datos = Liquidaciones::all()->where('liq_idEmpresa', auth()->user()->empresa)
        ->where('liq_tipo','=',$tt_codigo);
          return view('liquidaciones/verLiquidaciones', compact('datos', 'data'));
        }
        else{
    //
    // busca si ya está la liquidacion a crear 
    //
            if (DB::table('liquidaciones')->where('liq_idEmpresa', auth()->user()->empresa)
            ->where('liq_tipo','=',$tt_codigo)
            ->where('liq_periodo','=',$par_periodo)
            ->exists()) 
            {
                if ($borrarliq == 'N'){
                    return redirect()->route("liquidaciones")->with("success","ESTA LIQUIDACION YA EXISTE.  Marque: si ya existe borrar sus datos");
                }
                else{
                    $liquidaciones = Liquidaciones::where('liq_tipo','=',$tt_codigo)
                    ->where('liq_periodo','=',$par_periodo)
                    ->first();
                    $id = $liquidaciones->id;
                    $estado = $liquidaciones->liq_estado;
    //
    // la liquidación está cerrada
    //                    
                    if ($estado == 'C'){
                        return redirect()->route("liquidaciones")->with("success","ESTA LIQUIDACION YA FUE CERRADA, Revice el periodo en parametros - liquidacion");
                    }
                    else{
    //
    // Borra la liquidación y sus acumulados
    //                         
                        DB::table('liquidaciones')->delete($id);
                        Acumulados::where('acu_idLiquidacion', $id)->delete();                       
                    }

                }
            }
    //
    // Crea la liquidación y sus acumulados
    //             

        
        $parametros = Parametros::all()->where('par_idEmpresa','=',auth()->user()->empresa);
        if(!empty($parametros)){
            foreach ($parametros as $parametro){                  
                $par_festivadiurna = $parametro->par_festivadiurna;
                $par_festivanocturna = $parametro->par_festivanocturna;
                $par_horasnocturna = $parametro->par_horasnocturna;
                $par_horasdiurna = $parametro->par_horasdiurna;
                $par_horasdiurna = $parametro->par_horasdiurna;
                $par_smmlv = $parametro->par_smmlv;
                $par_auxTransporte = $parametro->par_auxTransporte;
                $par_uvt = $parametro->par_uvt;
                $par_retefuente_rango0 = $parametro->par_retefuente_rango0;
                $par_retefuente_rango1 =  $parametro->par_retefuente_rango1;
                $par_retefuente_rango2 =  $parametro->par_retefuente_rango2;
                $par_retefuente_rango3 =  $parametro->par_retefuente_rango3;
                $par_retefuente_rango4 =  $parametro->par_retefuente_rango4;
                $par_retefuente_rango5 =  $parametro->par_retefuente_rango5;
                $par_retefuente_rango6 =  $parametro->par_retefuente_rango6;
                $par_retefunte_porc0 =  $parametro->par_retefunte_porc0;
                $par_retefunte_porc1 =  $parametro->par_retefunte_porc1;
                $par_retefunte_porc2 =  $parametro->par_retefunte_porc2;
                $par_retefunte_porc3 =  $parametro->par_retefunte_porc3;
                $par_retefunte_porc4 =  $parametro->par_retefunte_porc4;
                $par_retefunte_porc5 =  $parametro->par_retefunte_porc5;
                $par_retefunte_porc6 =  $parametro->par_retefunte_porc6;    
                $par_codigo_salario =  $parametro->par_codigo_salario;
                $par_codigo_trasporte =  $parametro->par_codigo_trasporte;
                $par_codigo_hrsRxtras =  $parametro->par_codigo_hrsRxtras;
                $par_codigo_bonos =  $parametro->par_codigo_bonos;
                $par_codigo_salud =  $parametro->par_codigo_salud;
                $par_codigo_pension =  $parametro->par_codigo_pension; 
                $par_codigo_riesgos =  $parametro->par_codigo_riesgos;
                $par_codigo_retefuente =  $parametro->par_codigo_retefuente;        
                
        // lleva valores de parametrización
        $para = ["par_horasdiurna" => $par_horasdiurna, "par_horasnocturna" => $par_horasnocturna,
            "par_festivadiurna" => $par_festivadiurna,"par_festivanocturna" => $par_festivanocturna,
            "par_smmlv" => $par_smmlv,"par_auxTransporte" => $par_auxTransporte, "par_uvt" => $par_uvt,
            "par_retefuente_rango0" => $par_retefuente_rango0, "par_retefuente_rango1" => $par_retefuente_rango1,
            "par_retefuente_rango2" => $par_retefuente_rango2, "par_retefuente_rango3" => $par_retefuente_rango3,
            "par_retefuente_rango4" => $par_retefuente_rango4, "par_retefuente_rango5" => $par_retefuente_rango5,
            "par_retefuente_rango6" => $par_retefuente_rango6, 
            "par_retefunte_porc0" => $par_retefunte_porc0 ,"par_retefunte_porc1" => $par_retefunte_porc1,
            "par_retefunte_porc2" => $par_retefunte_porc2 ,"par_retefunte_porc3" => $par_retefunte_porc3,
            "par_retefunte_porc4" => $par_retefunte_porc4 ,"par_retefunte_porc5" => $par_retefunte_porc5,
            "par_retefunte_porc6" => $par_retefunte_porc6, "par_codigo_salario" => $par_codigo_salario,
            "par_codigo_trasporte" => $par_codigo_trasporte, "par_codigo_hrsRxtras" => $par_codigo_hrsRxtras, 
            "par_codigo_bonos" => $par_codigo_bonos, "par_codigo_salud" => $par_codigo_salud,
            "par_codigo_pension" => $par_codigo_pension, "par_codigo_riesgos" => $par_codigo_riesgos, 
            "par_codigo_retefuente" => $par_codigo_retefuente]; 
            }     
        }

        $ingresos = Ingresos::all()->where('ing_idEmpresa', auth()->user()->empresa)
        ->where('ing_estado','A');

        $liquidaciones = new Liquidaciones;  
        $liquidaciones->liq_idEmpresa= auth()->user()->empresa;
        $liquidaciones->liq_tipo = $tt_codigo;
        $liquidaciones->liq_fechaDesde = $par_fechaDesde;
        $liquidaciones->liq_fechaHasta = $par_fechaHasta;
        $liquidaciones->liq_idEmpleado = $liq_idEmpleado;
        $liquidaciones->liq_periodo = $par_periodo;
        $liquidaciones->liq_estado = 'P';  
        $liquidaciones->save();
        $liqId = $liquidaciones->id;

    // Liquida todos los ingresos
        foreach ($ingresos as $ingreso){
            $fchIngreso = $ingreso->ing_fechaIngreso;
            $empleado = $ingreso->ing_idEmpleado;
            $cargo = $ingreso->ing_idCargo;
            $salarioMes =  $ingreso->ing_salario;            
            $salarioDiario = 0;
            $salarioHora = 0;

    // Salario básico mes, dia y hora
            if ($salarioMes  == 0 ){
                $cargos = Cargos::find($cargo);
                if(!empty($cargos)){
                    $salarioMes = $cargos->car_salario;
                }
            }
            $salarioDiario = $salarioMes / 30;
            $salarioHora = $salarioDiario / 8;

    // dias trabajados en el periodo
            $dias = LiquidacionesController::nroDias($fchIngreso,  $par_fechaHasta, $par_fechaDesde, $empleado, $tt_codigo);
            if ($dias > 30){
                $dias = 30;
            }
             
        if($tt_codigo == 'LP'){
             // Liquida Devengados: salario, trasporte, horas extras 

            //  Liquida salario 
               $nro = $dias;
               $conceptos = Conceptos::where('cp_idEmpresa', auth()->user()->empresa)
               ->where('cp_codigo',$par_codigo_salario)->get();
               if(!empty($conceptos)){
                    foreach ($conceptos as $concepto){  
                        $concepto_id = $concepto->id; 
                    }
                }

                if ($dias  >  0){
                   $salario = ($salarioMes * 30) / $dias;    
                   LiquidacionesController::grabaAcumulados($liqId, $par_periodo ,$empleado, $concepto_id, $nro, $salario);
               }
       
            //  Liquida trasporte 
                if ($salarioMes <= $para['par_smmlv'] * 2){
                    $conceptos = Conceptos::where('cp_idEmpresa', auth()->user()->empresa)
                    ->where('cp_codigo',$par_codigo_trasporte)->get();
                    if(!empty($conceptos)){
                        foreach ($conceptos as $concepto){  
                        $concepto_id = $concepto->id; 
                        }
                    }
                    $valor = $para['par_auxTransporte'];
                    if ($dias   >  0){
                        $valorTrans = ($valor * 30) / $dias;    
                        LiquidacionesController::grabaAcumulados($liqId, $par_periodo ,$empleado, $concepto_id, $nro, $valorTrans);
                    }
                }
            
            // Horas extras
                $conceptos = Conceptos::where('cp_idEmpresa', auth()->user()->empresa)
                ->where('cp_codigo',$par_codigo_hrsRxtras)->get();
                if(!empty($conceptos)){
                    foreach ($conceptos as $concepto){  
                       $concepto_id = $concepto->id; 
                       }
                   }       
                $vlrExtras = LiquidacionesController::liqHorasExtras($empleado, $par_periodo, $para, $salarioHora);                 
                if($vlrExtras > 0){
                    LiquidacionesController::grabaAcumulados($liqId, $par_periodo ,$empleado, $concepto_id, $nro,  $vlrExtras);
                }
   
            // Novedades del periodo solo para liquidación periódica    
                $permanantes = LiquidacionesController::leeNnovedadesPermanantes($liqId, $empleado, $dias, $par_periodo);
                $ocasionales = LiquidacionesController::leeNnovedadesOcasionales($liqId, $empleado,  $dias, $par_periodo);
            
            // DES C U E N T O S

            $valor = $salario + $vlrExtras + $permanantes + $ocasionales;

            //  salud
           
            $base = ($valor * 30) / $dias; 
            $conceptos = Conceptos::where('cp_idEmpresa', auth()->user()->empresa)
            ->where('cp_codigo',$par_codigo_salud)->get();
            if(!empty($conceptos)){
                foreach ($conceptos as $concepto){  
                   $concepto_id = $concepto->id; 
                   $cp_porcentajeDefault = $concepto->cp_porcentajeDefault;
                   }
               } 
            if($base > 0){
                $salud = (-1) * $base * $cp_porcentajeDefault  / 100;
                LiquidacionesController::grabaAcumulados($liqId, $par_periodo ,$empleado, $concepto_id, $nro,  $salud);
            }

        //  Pensión

            $conceptos = Conceptos::where('cp_idEmpresa', auth()->user()->empresa)
            ->where('cp_codigo',$par_codigo_pension)->get();
            if(!empty($conceptos)){
                foreach ($conceptos as $concepto){  
                $concepto_id = $concepto->id; 
                $cp_porcentajeDefault = $concepto->cp_porcentajeDefault;
                }
            } 
            if($base > 0){
                $pension = (-1) * $base * $cp_porcentajeDefault / 100;
                LiquidacionesController::grabaAcumulados($liqId, $par_periodo ,$empleado, $concepto_id, $nro,  $pension);
            }


        }
    
    }


    // $par_codigo_bonos =  $parametro->par_codigo_bonos;
    // $par_codigo_salud =  $parametro->par_codigo_salud;
    // $par_codigo_pension =  $parametro->par_codigo_pension; 
    // $par_codigo_riesgos =  $parametro->par_codigo_riesgos;
    // $par_codigo_retefuente =  $parametro->par_codigo_retefuente; 




    //
    // Recupera para mostar las liquidaciones   FINAL -----
    //            
   
        $datos = Liquidaciones::all()->where('liq_idEmpresa', auth()->user()->empresa)
        ->where('liq_tipo','=',$tt_codigo);
            return view('liquidaciones/verLiquidaciones', compact('datos', 'data'));
        }
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
        ->select('liq_tipo', 'liq_fechaDesde', 'liq_fechaHasta', 'liq_idEmpleado', 'liq_periodo', 'liq_estado')
        ->orderBy('liq_periodo','desc');

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

                     
    private function nroDias($fchIngreso,  $par_fechaHasta,  $par_fechaDesde, $empleado, $tt_codigo){
        $df=date_create($par_fechaHasta);
        $di=date_create($fchIngreso);
        $contador = date_diff($df, $di);
        $differenceFormat = '%a';
        //  verificar si esta en vacaciones o en licencia suspencion
        return $contador->format($differenceFormat) + 1;
    }
    private function liqHorasExtras($empleado,  $par_periodo, $para, $salarioHora){
        $valor=0;
        $horasExtras = Horas_extras::all()->where('hex_idEmpresa','=',auth()->user()->empresa)
        ->where('hex_idEmpleado','=', $empleado)
        ->where('hex_estado','=', 'P')
        ->where('hex_periodo','=', $par_periodo);

        if(!empty($horasExtras)){
            foreach ($horasExtras as $horas){               
                if ($horas->hex_diurnas  >  0){
                    $valor += $horas->hex_diurnas *  $salarioHora * $para['par_horasdiurna'];
                }
                if ($horas->hex_nocturnas  >  0){
                    $valor += $horas->hex_nocturnas *  $salarioHora * $para['par_horasnocturna'];
                }
                if ($horas->hex_festivasDiurna  >  0){
                    $valor += $horas->hex_festivasDiurna *  $salarioHora * $para['par_festivadiurna'];
                }
                if ($horas->hex_festivasNocturna  >  0){
                    $valor += $horas->hex_festivasNocturna *  $salarioHora * $para['par_festivanocturna'];
                }        
            }
        }
        return $valor;
    }
   
    private function leeNnovedadesPermanantes($liqId, $empleado, $nro, $par_periodo){
        $novedades = Novedades::all()->where('nov_idEmpresa','=',auth()->user()->empresa)
        ->where('nov_idEmpleado','=', $empleado)
        ->where('nov_tipo','=', 'P');
        $permanantes=0;
        if(!empty($novedades)){
            foreach ($novedades as $novedad){   
                $permanantes += $novedad->nov_valor;
                LiquidacionesController::grabaAcumulados($liqId, $par_periodo ,$empleado, $novedad->nov_idConcepto, $nro, $novedad->nov_valor);
            }     
        }
        return $permanantes;
    }

    private function leeNnovedadesOcasionales($liqId, $empleado, $nro, $par_periodo){
        $novedades = Novedades::all()->where('nov_idEmpresa','=',auth()->user()->empresa)
        ->where('nov_idEmpleado','=', $empleado)
        ->where('nov_periodo','=', $par_periodo)
        ->where('nov_tipo','=', 'O');
        $ocasionales=0;
        if(!empty($novedades)){
            foreach ($novedades as $novedad){   
                $ocasionales +=  $novedad->nov_valor;
                LiquidacionesController::grabaAcumulados($liqId, $par_periodo ,$empleado, $novedad->nov_idConcepto, $nro, $novedad->nov_valor);
            }     
        }
        return;
    }


    private function grabaAcumulados($liqId, $par_periodo ,$empleado, $concepto,   $nro,  $valor){
        $acumulados = new Acumulados();
        $acumulados->acu_idEmpresa = auth()->user()->empresa; 
        $acumulados->acu_idLiquidacion = $liqId;
        $acumulados->acu_periodo = $par_periodo;
        $acumulados->acu_idEmpleado = $empleado;
        $acumulados->acu_idConcepto = $concepto;
        $acumulados->acu_numero = $nro;
        if($valor > 0){
            $acumulados->acu_debitos = $valor;
        }else{
            $acumulados->acu_creditos = $valor * (-1);
        }
       
        $acumulados->acu_estado = 'A';
        $acumulados->save();
        return;
    }

        
    public function export (){
        return Excel::download(new CargosExport, 'cargos.xlsx');
     }

     public function cargaxls()
     {
         return view('cargos/cargaxls');
    }
//    https://www.digitalocean.com/community/tutorials/easier-datetime-in-laravel-and-php-with-carbon
}
