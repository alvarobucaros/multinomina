<?php

namespace App\Http\Controllers;

use App\Models\DiasHabiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiasHabilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = DiasHabiles::where('dias_idEmpresa', auth()->user()->empresa)
        ->orderBy('dias_fecha')
        ->paginate(15);      
        return view('diasHabiles/index', compact('datos'));
    }

 
    
    public function creaano()
    {
   
        $diasHabiles =DiasHabiles::where('dias_idEmpresa', auth()->user()->empresa);
        $diasHabiles->dias_idEmpresa = auth()->user()->empresa;
        $diasHabiles->dias_fecha = date("Y-m-d");
        return view('diasHabiles/creaano', compact('diasHabiles'));
    }
    

    public function nuevoano(string $id)
    {
        date_default_timezone_set('America/Mexico_City');
        $ano = substr($id, 0, 4);
        $the_date = $ano."-01-01"; // enro 1 del año leido
        $desde = $ano."-01-01";
        $hasta = $ano."-12-31";
        $festivos = array($ano."-01-01", $ano."-05-01", $ano."-12-25",
        $ano."-07-20", $ano."-08-07", $ano."-10-12");
        $number_of_the_day = date('w', strtotime($the_date));

        DB::table('dias_habiles')->where('dias_idEmpresa', ' = ' , auth()->user()->empresa)
        ->where('dias_fecha', '>=' ,  $desde) 
        ->where('dias_fecha', '<=' ,  $hasta)
        ->delete();
      // return redirect()->route("diasHabiles")->with("success","Borrado correctamente");

       for ($i = 0; $i < 365; $i++){
            $diasHabiles = new DiasHabiles();
            $diasHabiles->dias_idEmpresa = auth()->user()->empresa;
            if ($i > 0  ){
                $the_date = date("Y-m-d",strtotime($the_date."+ 1 days"));
            }
            $number_of_the_day = date('w', strtotime($the_date));
            if($number_of_the_day == 0 || $number_of_the_day == 6){
                $diasHabiles->dias_habil = "N";
            }else{
                $diasHabiles->dias_habil = "H";
            }
            for ($j = 0; $j <= count($festivos) - 1; $j++){
                if ($the_date == $festivos[$j]){ $diasHabiles->dias_habil = "N";}
            }
            $diasHabiles->dias_fecha = $the_date;
            $diasHabiles->save();
        }
       

//$fecha_actual = date("d-m-Y");
//sumo 1 día
// echo date("d-m-Y",strtotime($fecha_actual."+ 1 days")); 
    
        return redirect()->route("diasHabiles")->with("success","Creado correctamente");
    }
    public function create()
    {
        $diasHabiles = new DiasHabiles();
        $diasHabiles->dias_idEmpresa = auth()->user()->empresa;
        return view('diasHabiles/agregar', compact('diasHabiles'));
    }

 
    public function store(Request $request)
    {
        $diasHabiles = new DiasHabiles();
        $diasHabiles->dias_idEmpresa= auth()->user()->empresa;
        $diasHabiles->dias_nombre = $request->post('dias_nombre');
        $diasHabiles->dias_estado = $request->post('dias_estado');
        $diasHabiles->save();
        return redirect()->route("diasHabiles")->with("success","Agregado correctamente");
    }

    public function show(string $id)
    {
        $diasHabiles = DiasHabiles::find($id);
        return view('diasHabiles/eliminar', compact('diasHabiles'));
    }

    public function edit(string $id)
    {
        $diasHabiles = DiasHabiles::find($id);
        return view('diasHabiles/actualizar', compact('diasHabiles'));
    }


    public function update(Request $request, DiasHabiles $diasHabiles)
    {
        $diasHabiles = DiasHabiles::find($id); 
        $diasHabiles->dias_idEmpresa= auth()->user()->empresa;
        $diasHabiles->dias_nombre = $request->post('dias_nombre');
        $diasHabiles->dias_estado = $request->post('dias_estado');
        $diasHabiles->save();
        return redirect()->route("diasHabiles")->with("success","Actualizado correctamente");
    }
    public function destroy(string $id)
    {
        $diasHabiles = DiasHabiles::find($id); 
        $diasHabiles->delete();
        return redirect()->route("diasHabiles")->with("success","Eliminado correctamente");
    }

    public function export() 
    {
        return Excel::download(new DiasHabilesExport, 'diasHabiles.xlsx');
        return redirect()->route("diasHabiles")->with("success","Exportado correctamente");
    }

}
