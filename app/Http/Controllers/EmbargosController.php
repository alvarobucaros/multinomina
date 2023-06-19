<?php

namespace App\Http\Controllers;

use App\Models\Embargos;
use App\Models\Empleados;
use App\Models\Terceros;
use App\Models\TiposVarios;

use Illuminate\Http\Request;

class EmbargosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $datos = Embargos::where('emb_idEmpresa', auth()->user()->empresa)
        ->join('empleados','empleados.id','=','embargos.emb_idEmpleado')
        ->join('terceros','terceros.id','=','embargos.emb_idTercero')
        ->select('empl_primerNombre', 'empl_otroNombre', 'empl_primerApellido', 
        'empl_otroApellido','ter_nombre', 'embargos.id','emb_idEmpresa','emb_idEmpleado',
        'emb_idTercero','emb_valorCuota','emb_valorTotal','emb_estado') 
        ->where('emb_estado', '=', 'A')
        ->orderBy('emb_estado')
        ->orderBy('empl_primerApellido')
        ->orderBy('empl_primerNombre')
        ->paginate(8);   
        return view('embargos/index', compact('datos'));  
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
      
        $terceros = Terceros::where('ter_idEmpresa', auth()->user()->empresa)
        ->where('ter_estado','A')
        ->where('ter_idTipoTercero','8')
        ->orderBy("ter_nombre")->get();

        $embargos = new Embargos();
        $embargos->emb_idEmpresa = auth()->user()->empresa;
        $embargos->emb_estado = 'A';
        $embargos->emb_tipo='';
        $embargos->emb_valorDefault = 0;
        $embargos->emb_porcentajeDefault = 0;
        return view('embargos/agregar', compact('embargos','empleados','terceros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $embargos = new Embargos();
        $embargos->emb_idEmpresa= auth()->user()->empresa;
        $embargos->emb_idEmpleado = $request->post('emb_idEmpleado');
        $embargos->emb_idTercero = $request->post('emb_idTercero');
        $embargos->emb_valorCuota = $request->post('emb_valorCuota');
        $embargos->emb_valorTotal = $request->post('emb_valorTotal');
        $embargos->emb_estado = $request->post('emb_estado');
        $embargos->save();
        return redirect()->route("embargos")->with("success","Agregado correctamente");
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar = explode('|',$id);
        return view('embargos/eliminar', compact('ar'));

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
        ->where('tipos_varios.tt_clase','JZ')
        ->orderBy("ter_nombre")->get();

       $embargos = Embargos::find($id);
        return view('embargos/actualizar', compact('embargos','empleados','terceros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Embargos $embargos)
    {
        $embargos->emb_idEmpresa= auth()->user()->empresa;
        $embargos->emb_idEmpleado = $request->post('emb_idEmpleado');
        $embargos->emb_idTercero = $request->post('emb_idTercero');
        $embargos->emb_valorCuota = $request->post('emb_valorCuota');
        $embargos->emb_valorTotal = $request->post('emb_valorTotal');
        $embargos->emb_estado = $request->post('emb_estado');        $embargos->save();
        return redirect()->route("embargos")->with("success","Actualizado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $embargos = Embargos::find($id); 
        $embargos->delete();
        return redirect()->route("embargos")->with("success","Eliminado correctamente");
    }

     public function export (){

     }
}
