<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Empresas;

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
