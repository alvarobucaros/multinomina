<?php

namespace App\Http\Controllers;

use App\Models\Horas_extras;
use App\Models\Empleados;

use Illuminate\Http\Request;

class HorasExtrasController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Horas_extras::where('hex_idEmpresa', auth()->user()->empresa)
        ->join('empleados','empleados.id','=','horas_extras.hex_idEmpleado')
        ->orderBy('hex_periodo', 'asc', 'hex_idEmpleado', 'asc')
        ->paginate(8);      
        return view('horas_Extras/index', compact('datos'));  
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->join('ingresos','ingresos.ing_idEmpleado','=','empleados.id')
        ->where('empl_estado','A')
        ->orderBy("empl_primerApellido")
        ->orderBy("empl_primerNombre")->get();
        
        $HorasExtras = new Horas_extras();
        $HorasExtras->hex_idEmpresa = auth()->user()->empresa;
        $HorasExtras->hex_periodo = '202301';
        $HorasExtras->hex_diurnas = 0;
        $HorasExtras->hex_nocturnas = 0;
        $HorasExtras->hex_festivasNocturna = 0;
        $HorasExtras->hex_festivasDiurna = 0;
        $HorasExtras->hex_estado = 'P';
        return view('horas_extras/agregar', compact('HorasExtras','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $HorasExtras = new Horas_extras();

        $HorasExtras->hex_idEmpresa= auth()->user()->empresa;
        $HorasExtras->hex_idEmpleado = $request->post('hex_idEmpleado');
        $HorasExtras->hex_periodo = $request->post('hex_periodo');
        $HorasExtras->hex_diurnas = $request->post('hex_diurnas');
        $HorasExtras->hex_nocturnas = $request->post('hex_nocturnas');
        $HorasExtras->hex_festivasDiurna = $request->post('hex_festivasDiurna');        
        $HorasExtras->hex_festivasNocturna = $request->post('hex_festivasNocturna');
        $HorasExtras->hex_estado = $request->post('hex_estado');
        $HorasExtras->save();
        return redirect()->route("horas_extras")->with("success","Agregado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $HorasExtras = Horas_extras::find($id);
        return view('horas_extras/eliminar', compact('HorasExtras'));
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $HorasExtras = Horas_extras::find($id);
        return view('horas_extras/actualizar', compact('HorasExtras'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $HorasExtras = Horas_extras::find($id); 
        $HorasExtras->hex_idEmpresa= auth()->user()->empresa;
        $HorasExtras->hex_idEmpleado = $request->post('hex_idEmpleado');
        $HorasExtras->hex_periodo = $request->post('hex_periodo');
        $HorasExtras->hex_diurnas = $request->post('hex_diurnas');
        $HorasExtras->hex_nocturnas = $request->post('hex_nocturnas');
        $HorasExtras->hex_festivasDiurna = $request->post('hex_festivasDiurna');        
        $HorasExtras->hex_festivasNocturna = $request->post('hex_festivasNocturna');
        $HorasExtras->hex_estado = $request->post('hex_estado');
        $HorasExtras->save();
        return redirect()->route("horas_extras")->with("success","Actualizado correctamente");    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        print_r  ($id);
        $HorasExtras = Horas_extras::find($id); 
        $HorasExtras->delete();
        return redirect()->route("horas_extras")->with("success","Eliminado correctamente");
    }

    public function liquida (){

    }
    
     public function export (){

     }
}
