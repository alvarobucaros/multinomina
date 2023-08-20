<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Usuarios;
use App\Models\Parametros;
use App\Models\Conceptos;

use App\Models\User;


class EmpresasController extends Controller
{
    public function miempresa()
    {
        {
            $empresas = new Empresas();
            $empresas->em_saldo = '0';
            $empresas->em_estado = 'A';  
            $empresas->em_consecRcaja = '0';  
            $empresas->em_consecEgreso = '0';  
            $empresas->em_saldo = '0';  
            $empresas->em_autentica = 'M';  
            $empresas->em_observaciones=' ';
            $empresas->em_tipodoc='C'; 
            $empresas->em_us_nombre='';
            $empresas->em_us_telefono = ' ';
            $empresas->em_us_email = ' ';
            $empresas->em_us_tipodoc='C';
            $empresas->em_us_clave =  hash::make('Admin123');    
            
            return view('empresas/agregar', compact('empresas'));
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Empresas::where('id', auth()->user()->empresa);
        return view('empresas/index', compact('datos'));  
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
        $empresas = new Empresas();
       
        $empresas->em_nombre = $request->post('em_nombre');
        $empresas->em_direccion = $request->post('em_direccion');
        $empresas->em_ciudad = $request->post('em_ciudad');        
        $empresas->em_tipodoc = $request->post('em_tipodoc');
        $empresas->em_nrodoc = $request->post('em_nrodoc');
        $empresas->em_telefono = $request->post('em_telefono');
        $empresas->em_email = $request->post('em_email');
        $empresas->em_fchini = $request->post('em_fchini');
        $empresas->em_fchfin = $request->post('em_fchfin');
        $empresas->em_observaciones = $request->post('em_observaciones');
        $empresas->em_estado = $request->post('em_estado');
        $empresas->save();

        $latest_id = $empresas->id;
    
        $user = new User();
        $user->name = $request->post('em_us_nombre');
        $user->email = $request->post('em_us_email');
        $user->username = 'Admin';
        $user->email_verified_at =  date('d-m-Y H:i:s');;
        $user->password  =  bcrypt('Admin123');
        $user->empresa = $latest_id;
        $user->estado = 'A';
        $user->profile = 'A';
        $user->direccion = $request->post('em_direccion');
        $user->ciudad = $request->post('em_ciudad');
        $user->en_nombre = ''; 
        $user->codigo = $request->post('em_us_codigo'); 
        $user->telefono = $request->post('em_us_telefono'); 
        $user->tipodoc = $request->post('em_us_tipodoc'); 
        $user->nrodoc = $request->post('em_us_nrodoc'); 
        $user->save();

        $parametros = new Parametros();
        $parametros->par_idEmpresa = $latest_id;
        $parametros->par_porcCaja = '4.00';
        $parametros->par_porcICBF ='3.00';
        $parametros->par_porSENA ='2.00';
        $parametros->par_porcRiesgos = '0.522';
        $parametros->par_porcESAP = '0.00';
        $parametros->par_porcFODE = '0.00';
        $parametros->par_fondoRiesgos = '0.0';
        $parametros->par_CajaSubsidio = '0';
        $parametros->par_representante = '';
        $parametros->par_tipoDocRepresentante = 'C';
        $parametros->par_nroDocRepresentante ='0';
        $parametros->par_tesorero = '';
        $parametros->par_tipoDocTesorero = 'C';
        $parametros->par_nroDocTesorero = '0';
        $parametros->par_festivadiurna = '2.00';
        $parametros->par_festivanocturna = '2.50';
        $parametros->par_horasnocturna = '1.75';
        $parametros->par_horasdiurna = '1.25';
        $parametros->par_periodo = '';
        $parametros->par_liquidacion = 'M';
        $parametros->par_smmlv = '0';  
        $parametros->par_auxTransporte = '0';
        $parametros->par_diasVacaciones = '15';
        $parametros->par_horasMes = '240';
        $parametros->save();
    
        $conceptos = new Conceptos();
        $conceptos->cp_idEmpresa = $latest_id;
        $conceptos->cp_tipo = $request->post('cp_tipo');
        $conceptos->cp_titulo = $request->post('cp_titulo');
        $conceptos->cp_descripcion = $request->post('cp_descripcion');
        $conceptos->cp_fechaDesde = $request->post('cp_fechaDesde');
        $conceptos->cp_fechaHasta = $request->post('cp_fechaHasta');        
        $conceptos->cp_valorDefault = $request->post('cp_valorDefault');
        $conceptos->cp_porcentajeDefault = $request->post('cp_porcentajeDefault');
        $conceptos->cp_estado = $request->post('cp_estado');
        $conceptos->cp_clase = $request->post('cp_clase');
        $conceptos->save();

        return redirect()->route("/");
             

        return redirect()->route("empresas")->with("success","Agregado correctamente");
    



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
        $empresas = Empresas::find($id);
        return view('empresas/actualizar', compact('empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $empresas = Empresas::find($id); 
       $empresas->em_nombre = $request->post('em_nombre');
       $empresas->em_direccion = $request->post('em_direccion');  
       $empresas->em_ciudad = $request->post('em_ciudad');  
       $empresas->em_tipodoc=$request->post('em_tipodoc');
       $empresas->em_tipodoc=$request->post('em_tipodoc');
       $empresas->em_nrodoc=$request->post('em_nrodoc');
       $empresas->em_telefono = $request->post('em_telefono');
       $empresas->em_email =$request->post('em_email');
       $empresas->em_observaciones=$request->post('em_observaciones');
       $empresas->em_fchini =$request->post('em_fchini');
       $empresas->em_fchfin =$request->post('em_fchfin');
       $empresas->em_estado =$request->post('em_estado');
       $empresas->save();
       return redirect()->route("empresas")->with("success","Actualizado correctamente");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
