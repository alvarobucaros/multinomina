<?php

namespace App\Http\Controllers;

use App\Models\Acumulados;
use App\Models\Empleados;
use App\Models\Conceptos;
use Illuminate\Http\Request;

use PDF;

class AcumuladosController extends Controller
{
 
    public function index(Request $request)
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->join('ingresos','ingresos.ing_idEmpleado','=','empleados.id')
        ->where('empl_estado','A')
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get();

        return view('acumulados/index',  compact('empleados'));  
    }

    public function list(Request $request)
    {
        $periodo = $request->post('acu_periodo');
        $idEmpleado = $request->post('acu_idEmpleado');

        $datos = Acumulados::where('acu_idEmpresa', auth()->user()->empresa)
        ->join('empleados','empleados.id','=','acu_idEmpleado')
        ->join('conceptos','conceptos.id','=','acu_idConcepto')
        
        ->where('acu_periodo',$periodo)      
        ->orderBy('empl_primerApellido') 
        ->orderBy('empl_otroApellido') 
        ->orderBy('empl_primerNombre') 
        ->orderBy( 'empl_otroNombre') 
        ->orderBy('acu_creditos')  
        ->orderBy('acu_idConcepto')->get();

        if($idEmpleado > 0 ){
            $datos ->where('acu_idEmpleado',$idEmpleado) ;
        }
  
        $datos;
        
       
       // return view('conceptos/index', compact('datos'));  


      //  $datos = Acumulados::where('acu_idEmpresa', auth()->user()->empresa);
       // ->where('acu_periodo',$periodo);
        // ->join('empleados','empleados.id','=','aumulados.acu_idEmpleado')
        // ->join('conceptos','conceptos.id','=','aumulados.acu_idConcepto')
    

        return view('acumulados/list', compact('datos'));  
    }

    public function createPDF(string $id) {
        $arr=explode('|',$id);
        $periodo = $arr[0];
        $idEmpleado = $arr[1];
        $data = Acumulados::where('acu_idEmpresa', auth()->user()->empresa)
        ->where('acu_periodo',$periodo)
        ->join('empleados','empleados.id','=','aumulados.acu_idEmpleado')
        ->join('conceptos','conceptos.id','=','aumulados.acu_idConcepto')
        ->orderBy('empl_primerApellido') 
        ->orderBy('empl_otroApellido') 
        ->orderBy('empl_primerNombre') 
        ->orderBy( 'empl_otroNombre') 
        ->orderBy('acu_creditos')  
        ->orderBy('acu_idConcepto') ;

  dd($data);

        // $data = Employee::all();
        // share data to view
        view()->share('employee',$data);
        $pdf = PDF::loadView('pdf_view', $data);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Acumulados $acumulados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acumulados $acumulados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acumulados $acumulados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acumulados $acumulados)
    {
        //
    }
}
