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
       // dd($row);
        return new Empleados([
        'empl_idEmpresa'  => auth()->user()->empresa,
        'empl_primerNombre' => $row['empl_primerNombre'],
        'empl_otroNombre' => $row['empl_otroNombre'], 
        'empl_primerApellido' => $row['empl_primerApellido'], 
        'empl_otroApellido' => $row['empl_otroApellido'], 
        'empl_tipodoc' => $row['empl_tipodoc'],
        'empl_nrodoc' => $row['empl_nrodoc'],
        'empl_codigo' => $row['empl_codigo'], 
        'empl_email' => $row['empl_email'], 
        'empl_telefono' => $row['empl_telefono'], 
        'empl_direccion' => $row['empl_direccion'], 
        'empl_ciudad' => $row['empl_ciudad'], 
        'empl_fechaIngreso' => $row['empl_fechaIngreso'], 
        'empl_fechaRetiro' => $row['empl_fechaRetiro'],
        'empl_estado' => $row['empl_estado'],
        ]);
    }
}
