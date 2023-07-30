<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Parametros;
use App\Models\Conceptos;

class ParametrosController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conceptos = Conceptos::where('cp_idEmpresa', auth()->user()->empresa)
        ->whereIn('cp_tipo', ['DD','DV'])
        ->orderBy('cp_tipo', 'desc', 'cp_titulo', 'asc')->get();

        $datos = Parametros::all()->where('par_idEmpresa', auth()->user()->empresa);
        return view('parametros/actualizar', compact('datos','conceptos'));  
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $parametros = Parametros::find($id); 
       
       $parametros->par_idEmpresa =auth()->user()->empresa;
       $parametros->par_porcCaja = $request->post('par_porcCaja');
       $parametros->par_porcICBF = $request->post('par_porcICBF');
       $parametros->par_porSENA = $request->post('par_porSENA');
       $parametros->par_porcRiesgos = $request->post('par_porcRiesgos'); 
       $parametros->par_porcESAP = $request->post('par_porcESAP');
       $parametros->par_porcFODE = $request->post('par_porcFODE');
       $parametros->par_fondoRiesgos = $request->post('par_fondoRiesgos');
       $parametros->par_CajaSubsidio = $request->post('par_CajaSubsidio');
       $parametros->par_representante = $request->post('par_representante');
       $parametros->par_tipoDocRepresentante = $request->post('par_tipoDocRepresentante'); 
       $parametros->par_nroDocRepresentante = $request->post('par_nroDocRepresentante');
       $parametros->par_tesorero = $request->post('par_tesorero');
       $parametros->par_tipoDocTesorero = $request->post('par_tipoDocTesorero');
       $parametros->par_nroDocTesorero = $request->post('par_nroDocTesorero');
       $parametros->par_festivadiurna = $request->post('par_festivadiurna');
       $parametros->par_festivanocturna = $request->post('par_festivanocturna');
       $parametros->par_horasnocturna = $request->post('par_horasnocturna');
       $parametros->par_horasdiurna = $request->post('par_horasdiurna');
       $parametros->par_periodo = $request->post('par_periodo');
       $parametros->par_liquidacion = $request->post('par_liquidacion');
       $parametros->par_smmlv = $request->post('par_smmlv');    
       $parametros->par_auxTransporte = $request->post('par_auxTransporte');
       $parametros->par_diasVacaciones = $request->post('par_diasVacaciones');
       $parametros->par_horasMes = $request->post('par_horasMes'); 
       $parametros->par_uvt = $request->post('par_uvt');
        $parametros->par_retefuente_rango0 = $request->post('par_retefuente_rango0');
        $parametros->par_retefuente_rango1 = $request->post('par_retefuente_rango1');
        $parametros->par_retefuente_rango2 = $request->post('par_retefuente_rango2');
        $parametros->par_retefuente_rango3 = $request->post('par_retefuente_rango3');
        $parametros->par_retefuente_rango4 = $request->post('par_retefuente_rango4');
        $parametros->par_retefuente_rango5 = $request->post('par_retefuente_rango5');
        $parametros->par_retefuente_rango6 = $request->post('par_retefuente_rango6');
        $parametros->par_retefunte_porc0 = $request->post('par_retefunte_porc0');
        $parametros->par_retefunte_porc1 = $request->post('par_retefunte_porc1');
        $parametros->par_retefunte_porc2 = $request->post('par_retefunte_porc2');
        $parametros->par_retefunte_porc3 = $request->post('par_retefunte_porc3');
        $parametros->par_retefunte_porc4 = $request->post('par_retefunte_porc4');
        $parametros->par_retefunte_porc5 = $request->post('par_retefunte_porc5');
        $parametros->par_retefunte_porc6 = $request->post('par_retefunte_porc6'); 
        $parametros->par_codigo_salario = $request->post('par_codigo_salario'); 
        $parametros->par_codigo_trasporte  = $request->post('par_codigo_trasporte'); 
        $parametros->par_codigo_hrsRxtras  = $request->post('par_codigo_hrsRxtras'); 
        $parametros->par_codigo_bonos  = $request->post('par_codigo_bonos'); 
        $parametros->par_codigo_salud  = $request->post('par_codigo_salud'); 
        $parametros->par_codigo_pension  = $request->post('par_codigo_pension'); 
        $parametros->par_codigo_riesgos  = $request->post('par_codigo_riesgos'); 
        $parametros->par_codigo_retefuente = $request->post('par_codigo_retefuente'); 

       $parametros->save();
       return redirect()->route("home.index")->with("success","Actualizado correctamente");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
