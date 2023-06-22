<?php

namespace App\Imports;

use App\Models\Empleados;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmpleadosImport implements ToModel, WithHeadingRow 
{
 
    public function model(array $row)
    {
        //dd($row);
        return new Empleados([
        'empl_idEmpresa'  => auth()->user()->empresa,
        'empl_primerNombre' => $row['primernombre'],
        'empl_otroNombre' => $row['otronombre'], 
        'empl_primerApellido' => $row['primerapellido'], 
        'empl_otroApellido' => $row['otroapellido'], 
        'empl_tipodoc' => $row['tipodoc'],
        'empl_nrodoc' => $row['nrodoc'],
        'empl_codigo' => $row['codigo'], 
        'empl_email' => $row['email'], 
        'empl_telefono' => $row['telefono'], 
        'empl_direccion' => $row['direccion'], 
        'empl_ciudad' => $row['ciudad'], 
        'empl_fechaIngreso' => $row['anoingreso'].'-'.$row['mesingreso'].'-'.$row['diaingreso'], 
        'empl_fechaRetiro' => '2099-01-01',
        'empl_estado' => 'A',
        ]);
    }
} 

