<?php

namespace App\Http\Controllers;

use App\Models\Acumulados;
use App\Models\Empleados;
use App\Models\Empresas;
use App\Models\Conceptos;
use App\Models\Parametros;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

use PDF;

class AcumuladosController extends Controller
{
    protected $fpdf;
 
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index(Request $request)
    {
        $periodos  = Parametros::where('par_idEmpresa', auth()->user()->empresa)->get('par_periodo');
        $datos = array();
        foreach ($periodos as $periodo){ 
            $p=$periodo->par_periodo;
            array_push($datos,$p);
         }
        
        
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->join('ingresos','ingresos.ing_idEmpleado','=','empleados.id')
        ->join('parametros','parametros.par_idEmpresa','=','empl_idEmpresa')
        ->where('empl_estado','A')
        ->select('empl_primerApellido','empl_otroApellido',
        'empl_primerNombre','empl_otroNombre', 'par_periodo')
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get();
        
        return view('acumulados/index',  compact('empleados','datos'));  
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
        ->orderBy('empl_otroNombre') 
        ->orderBy('acu_creditos')  
        ->orderBy('acu_idConcepto')->get();

        if($idEmpleado > 0 ){
            $datos ->where('acu_idEmpleado',$idEmpleado) ;
        }
        $datos;
        
        return view('acumulados/list', compact('datos'));  
    }

    public function createPDF(string $id) {
    
        $empresas = Empresas::where('empresas.id', auth()->user()->empresa)
        ->join('parametros','parametros.par_idEmpresa','=','empresas.id')->get();
    
        $this->acumuladosTitulo($empresas, $id);
        $y=25;
       
        $this->fpdf->SetFont('Arial','B',7);
        $this->fpdf->Text( 05, $y,'Periodo' );
        $this->fpdf->Text( 25, $y,' Empleado' );
        $this->fpdf->Text( 75, $y,'Concepto' );
        $this->fpdf->Text( 135, $y,'Cantidad' );
        $this->fpdf->Text( 160,$y, 'Devengado' );
        $this->fpdf->Text( 185, $y,'Deducido' );
      
        $y+=2;
        $this->fpdf->SetFont('Arial','',7);
        $this->fpdf->Line(3, $y, 200, $y); 
        $this->fpdf->SetY($y); 
        $acumulados = Acumulados::where('acumulados.acu_idEmpresa', auth()->user()->empresa)
        ->where('acumulados.acu_periodo',$id )
        ->join('conceptos','conceptos.id','=','acumulados.acu_idConcepto')
        ->join('empleados','empleados.id','=','acumulados.acu_idEmpleado')
        ->get(['acu_idEmpleado','acu_periodo', 'acu_numero', 'acu_debitos', 'acu_detalle',
        'acu_creditos', 'cp_descripcion', 'empl_primerApellido',
        'empl_otroApellido',  'empl_primerNombre', 'empl_otroNombre']);
        $idEmpleado = 0;
        $devengados = 0;
        $deducciones = 0;
        if(!empty($acumulados)){
            foreach ($acumulados as $acumulado){ 
                $y += 4;
                if($acumulado->acu_idEmpleado != $idEmpleado){
                    if($idEmpleado != 0){
                        $this->acumuladosCorte($devengados, $deducciones, $y);
                        $y += 10;
                    }
                    $idEmpleado = $acumulado->acu_idEmpleado;
                    $devengados = 0;
                    $deducciones = 0;
                    $empleadoNombre = $acumulado->empl_primerApellido . ' ' .
                    $acumulado->empl_otroApellido. ' ' . $acumulado->empl_primerNombre. ' ' .
                    $acumulado->empl_otroNombre;
                }
               
                $this->fpdf->Text( 05, $y,$acumulado->acu_periodo );
                $this->fpdf->Text( 16, $y, utf8_decode($empleadoNombre) ); 
                $this->fpdf->Text( 70, $y, utf8_decode($acumulado->cp_descripcion.' '.$acumulado->acu_detalle ));
                $this->fpdf->Text( 138, $y,$acumulado->acu_numero );
                $this->fpdf->SetXY(160,$y);
                $this->fpdf->Cell(12,0,  number_format($acumulado->acu_debitos,0,",","."),0,0,'R');
                $this->fpdf->SetXY(185,$y);
                $this->fpdf->Cell(12,0,  number_format($acumulado->acu_creditos,0,",","."),0,0,'R');
 
                $devengados += $acumulado->acu_debitos;
                $deducciones += $acumulado->acu_creditos;
                if($y > 240 ){
                    $this->acumuladosTitulo($empresas, $id);
                    $y=25;
                    $this->fpdf->SetFont('Arial','',7);
                }
            }
            $this->acumuladosCorte($devengados, $deducciones, $y);
            $y += 1;
        }
      // dd($acumulados);
        $y += 7;
        date_default_timezone_set('America/Bogota');
        $hoy= date("d-m-Y h:i a");
        $this->fpdf->SetY($y);
        $this->fpdf->SetFont('Arial','I',6);
        $this->fpdf->Cell(0,10,'Lista de Acuumulados .  Impreso en: '.$hoy,0,0,'L');
        $this->fpdf->Output();

        exit;
      }
  
      public function comprobantes(string $id) {
        exit;
      }

      private function acumuladosTitulo($empresas, $id){
        $this->fpdf->AddPage("P");
        $this->fpdf->SetFont('Arial','',10);
        $this->fpdf->SetTextColor(31,73,125); 
        $this->fpdf->SetFillColor(31,73,125);
        if(!empty($empresas)){
            foreach ($empresas as $empresa){ 
                $nombre = $empresa->em_nombre;
                $logo = './img/'.$empresa->par_logo;
                $tit = 'ACUMULADOS DE NOMINA. Período: '. $id;
                $this->fpdf->Image( $logo ,03,4,40,20);
                $w = 40 + (120 - strlen($nombre)) / 2;                
                $this->fpdf->Text( $w, 8, utf8_decode($nombre));
                $w = 40 + (120 - strlen($tit)) / 2;
                $this->fpdf->SetFont('Arial','B',10);
                $this->fpdf->Text( $w, 14, utf8_decode($tit));
            }
        }
      }

     private function acumuladosCorte($devengados, $deducciones, $y){ 
        $y += 2;
        $this->fpdf->Text( 160,$y, '--------------' );
        $this->fpdf->Text( 185, $y,'--------------' );
        $this->fpdf->SetFont('Arial','B',7);
        $y += 2;
        $this->fpdf->Text( 120, $y,'Sub Total' );
        $this->fpdf->SetXY(160,$y);
        $this->fpdf->Cell( 12,0, number_format($devengados,0,",","."),0,0,'R');
        $this->fpdf->SetXY(185,$y);
        $this->fpdf->Cell( 12,0,  number_format($deducciones,0,",","."),0,0,'R');
        $this->fpdf->SetFont('Arial','',7);
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
