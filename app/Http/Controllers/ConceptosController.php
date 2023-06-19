<?php

namespace App\Http\Controllers;
use App\Exports\ConceptosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

use App\Models\Conceptos;


class ConceptosController extends Controller
{
    public function index()
    {
        {
            $datos = Conceptos::where('cp_idEmpresa', auth()->user()->empresa)
            ->orderBy('cp_tipo', 'asc', 'cp_titulo', 'asc')
            ->paginate(8);      
            return view('conceptos/index', compact('datos'));  
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $conceptos = new Conceptos();
        $conceptos->cp_idEmpresa = auth()->user()->empresa;
        $conceptos->cp_estado = 'A';
        $conceptos->cp_tipo='';
        $conceptos->cp_valorDefault = 0;
        $conceptos->cp_porcentajeDefault = 0;
        return view('conceptos/agregar', compact('conceptos'));
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $conceptos = new Conceptos();
        $conceptos->cp_idEmpresa= auth()->user()->empresa;
        $conceptos->cp_tipo = $request->post('cp_tipo');
        $conceptos->cp_titulo = $request->post('cp_titulo');
        $conceptos->cp_descripcion = $request->post('cp_descripcion');
        $conceptos->cp_fechaDesde = $request->post('cp_fechaDesde');
        $conceptos->cp_fechaHasta = $request->post('cp_fechaHasta');        
        $conceptos->cp_valorDefault = $request->post('cp_valorDefault');
        $conceptos->cp_porcentajeDefault = $request->post('cp_porcentajeDefault');
        $conceptos->cp_estado = $request->post('cp_estado');
        $conceptos->save();
        return redirect()->route("conceptos")->with("success","Agregado correctamente");
    }
   

    /**
     * Display the specified resource.
     */
 
    public function show(string $id)
    {
        $conceptos = Conceptos::find($id);
        return view('conceptos/eliminar', compact('conceptos'));
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conceptos = Conceptos::find($id);
        return view('conceptos/actualizar', compact('conceptos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $conceptos = Conceptos::find($id); 
        $conceptos->cp_idEmpresa= auth()->user()->empresa;
        $conceptos->cp_tipo = $request->post('cp_tipo');
        $conceptos->cp_titulo = $request->post('cp_titulo');
        $conceptos->cp_descripcion = $request->post('cp_descripcion');
        $conceptos->cp_fechaDesde = $request->post('cp_fechaDesde');
        $conceptos->cp_fechaHasta = $request->post('cp_fechaHasta');        
        $conceptos->cp_valorDefault = $request->post('cp_valorDefault');
        $conceptos->cp_porcentajeDefault = $request->post('cp_porcentajeDefault');
        $conceptos->cp_estado = $request->post('cp_estado');
        $conceptos->save();
        return redirect()->route("conceptos")->with("success","Actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage. 
     */
    public function destroy(string $id)
    {
        $conceptos = Conceptos::find($id); 
        $conceptos->delete();
        return redirect()->route("conceptos")->with("success","Eliminado correctamente");
    }

     public function export (){
        return Excel::download(new ConceptosExport, 'conceptos.xlsx');
 
     }
     public function import (){
        return Excel::download(new ConceptosExport, 'conceptos.xlsx');
     }
}
