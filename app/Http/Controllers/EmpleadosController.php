<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empleados;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Empleados::where('empl_idEmpresa', auth()->user()->empresa)
        ->orderBy('empl_primerNombre')
        ->orderBy('empl_otroNombre')
        ->orderBy('empl_primerApellido')
        ->orderBy('empl_otroApellido')
        ->paginate(8);      
        return view('Empleados/index', compact('datos'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = new Empleados();
        $empleados->empl_idEmpresa = auth()->user()->empresa;
        $empleados->empl_estado = 'A';
        $empleados->empl_tipodoc='C';
        return view('empleados/agregar', compact('empleados'));
    }
  
 
    public function store(Request $request)
    {
        $empleados = new Empleados();
        $empleados->empl_idEmpresa= auth()->user()->empresa;
        $empleados->empl_primerNombre = $request->post('empl_primerNombre');
        $empleados->empl_otroNombre = $request->post('empl_otroNombre');
        $empleados->empl_primerApellido = $request->post('empl_primerApellido');
        $empleados->empl_otroApellido = $request->post('empl_otroApellido');
        $empleados->empl_direccion = $request->post('empl_direccion');
        $empleados->empl_ciudad = $request->post('empl_ciudad');        
        $empleados->empl_tipodoc = $request->post('empl_tipodoc');
        $empleados->empl_nrodoc = $request->post('empl_nrodoc');
        $empleados->empl_telefono = $request->post('empl_telefono');
        $empleados->empl_email = $request->post('empl_email');    
        $empleados->empl_codigo = $request->post('empl_codigo');
        $empleados->empl_fechaIngreso = $request->post('empl_fechaIngreso');
        $empleados->empl_fechaRetiro = $request->post('empl_fechaRetiro');
        $empleados->empl_estado = $request->post('empl_estado');
        $empleados->save();
        return redirect()->route("empleados")->with("success","Agregado correctamente");
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {     
        $empleados = Empleados::find($id);
        return view('empleados/eliminar', compact('empleados'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleados = Empleados::find($id);
        return view('empleados/actualizar', compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empleados = Empleados::find($id); 
        $empleados->empl_idEmpresa= auth()->user()->empresa;
        $empleados->empl_primerNombre = $request->post('empl_primerNombre');
        $empleados->empl_otroNombre = $request->post('empl_otroNombre');
        $empleados->empl_primerApellido = $request->post('empl_primerApellido');
        $empleados->empl_otroApellido = $request->post('empl_otroApellido');
        $empleados->empl_direccion = $request->post('empl_direccion');
        $empleados->empl_ciudad = $request->post('empl_ciudad');        
        $empleados->empl_tipodoc = $request->post('empl_tipodoc');
        $empleados->empl_nrodoc = $request->post('empl_nrodoc');
        $empleados->empl_telefono = $request->post('empl_telefono');
        $empleados->empl_email = $request->post('empl_email');    
        $empleados->empl_codigo = $request->post('empl_codigo');
        $empleados->empl_fechaIngreso = $request->post('empl_fechaIngreso');
        $empleados->empl_fechaRetiro = $request->post('empl_fechaRetiro');
        $empleados->empl_estado = $request->post('empl_estado');
        $empleados->save();
        return redirect()->route("empleados")->with("success","Actualizado correctamente");
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleados = Empleados::find($id); 
        $empleados->delete();
        return redirect()->route("empleados")->with("success","Eliminado correctamente");
    }

     public function export (){

     }
}
