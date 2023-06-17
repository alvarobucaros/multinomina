<?php

namespace App\Http\Controllers;

use App\Models\Licencias;
use App\Models\Empleados;

use Illuminate\Http\Request;

class LicenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Licencias::where('lic_idEmpresa', auth()->user()->empresa)
        ->join('empleados','empleados.id','=','licencias.lic_idEmpleado')
    
        ->select('empl_primerNombre', 'empl_otroNombre', 'empl_primerApellido', 
        'empl_otroApellido', 'licencias.id','lic_idEmpresa','lic_idEmpleado',
        'lic_tipo','lic_fechainicio','lic_fechaFinal','lic_estado') 


        ->where('lic_estado', '=', 'A')
        ->orderBy('empl_primerApellido')
        ->orderBy('empl_primerNombre')
        ->orderBy('lic_tipo')
        ->paginate(8);   
        return view('licencias/index', compact('datos')); 
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
        
        $licencias = new Licencias();
        $licencias-> lic_idEmpresa = auth()->user()->empresa;
        $licencias-> lic_valorCuota = 0;
        $licencias-> lic_estado='A';

        return view('licencias/agregar', compact('licencias','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $licencias = new Licencias();
        $licencias->lic_idEmpresa= auth()->user()->empresa;
        $licencias->lic_idEmpleado = $request->post('lic_idEmpleado');
        $licencias->lic_tipo = $request->post('lic_tipo');
        $licencias->lic_fechainicio = $request->post('lic_fechainicio');
        $licencias->lic_fechaFinal = $request->post('lic_fechaFinal');
        $licencias->lic_estado = $request->post('lic_estado');
        $licencias->save();
        return redirect()->route("licencias")->with("success","Agregado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar = explode('|',$id);
        return view('licencias/eliminar', compact('ar'));
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

       $licencias = licencias::find($id);
        return view('licencias/actualizar', compact('licencias','empleados'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Licencias $licencias)
    {
        $licencias->lic_idEmpresa= auth()->user()->empresa;
        $licencias->lic_idEmpleado = $request->post('lic_idEmpleado');
        $licencias->lic_tipo = $request->post('lic_tipo');
        $licencias->lic_fechainicio = $request->post('lic_fechainicio');
        $licencias->lic_fechaFinal = $request->post('lic_fechaFinal');
        $licencias->lic_estado = $request->post('lic_estado');       
        $licencias->save();
        return redirect()->route("licencias")->with("success","Actualizado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $licencias = Licencias::find($id); 
        $licencias->delete();
        return redirect()->route("licencias")->with("success","Eliminado correctamente");
    }

     public function export (){

     }
}
