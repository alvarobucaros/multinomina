<?php

namespace App\Http\Controllers;

use App\Models\Novedades;
use App\Models\Empleados;
use App\Models\Conceptos;
use Illuminate\Http\Request;

class NovedadesController extends Controller
{

    public function index()
    {
        $datos = Novedades::where('nov_idEmpresa', auth()->user()->empresa)
        ->join('empleados','empleados.id','=','novedades.nov_idEmpleado')
        ->join('conceptos','conceptos.id','=','novedades.nov_idConcepto')
        ->orderBy('nov_periodo', 'desc')
        ->orderBy( 'empleados.empl_primerApellido')
        ->orderBy( 'empleados.empl_primerNombre')
        ->paginate(8);      
        return view('novedades/index', compact('datos')); 
    }

    public function create()
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->join('ingresos','ingresos.ing_idEmpleado','=','empleados.id')
        ->where('empl_estado','A')
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get();

        $conceptos = Conceptos::where('cp_idEmpresa', auth()->user()->empresa)
        ->orderBy('cp_tipo', 'desc', 'cp_titulo', 'asc')
        ->where('cp_tipo','PE')->get();

        $novedades = new Novedades();
        $novedades->nov_idEmpresa = auth()->user()->empresa;
    
        $novedades->nov_cantidad = 0;
        $novedades->nov_valor = 0;
        $novedades->nov_estado = 'A';
        return view('novedades/agregar', compact('novedades','empleados','conceptos'));
    }

    public function store(Request $request)
    {
        $novedades = new Novedades();

        $novedades->nov_idEmpresa= auth()->user()->empresa;
        $novedades->nov_idEmpleado = $request->post('nov_idEmpleado');
        $novedades->nov_idConcepto = $request->post('nov_idConcepto');
        $novedades->nov_tipo = $request->post('nov_tipo');
        $novedades->nov_periodo = $request->post('nov_periodo');
        $novedades->nov_cantidad = $request->post('nov_cantidad');
        $novedades->nov_valor = $request->post('nov_valor');
        $novedades->nov_estado = $request->post('nov_estado');
        $novedades->save();
        return redirect()->route("novedades")->with("success","Agregado correctamente");
    }


    public function show(string $id)
    {
        $novedades = Novedades::find($id);
        return view('novedades/eliminar', compact('novedades'));
    }

    public function edit(string $id)
    {
        $novedades = Novedades::find($id);
        return view('novedades/actualizar', compact('novedades'));
    }


    public function update(Request $request, Novedades $novedades)
    {
        $novedades = new Novedades();

        $novedades->nov_idEmpresa= auth()->user()->empresa;
        $novedades->nov_idEmpleado = $request->post('nov_idEmpleado');
        $novedades->nov_idConcepto = $request->post('nov_idConcepto');
        $novedades->nov_tipo = $request->post('nov_tipo');
        $novedades->nov_periodo = $request->post('nov_periodo');
        $novedades->nov_cantidad = $request->post('nov_cantidad');
        $novedades->nov_valor = $request->post('nov_valor');
        $novedades->nov_estado = $request->post('nov_estado');
        $novedades->save();
        return redirect()->route("novedades")->with("success","Agregado correctamente");
    }

    public function destroy(string $id)
    {
        $novedades = Novedades::find($id); 
        $novedades->delete();
        return redirect()->route("novedades")->with("success","Eliminado correctamente");
    }

    public function liquida (){

    }
    
     public function export (){

     }
}
