<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $table = "empleados";

    protected $fillable = ['empl_idEmpresa', 'empl_primerNombre', 
    'empl_otroNombre', 'empl_primerApellido', 'empl_otroApellido', 
    'empl_tipodoc', 'empl_nrodoc', 'empl_codigo', 'empl_email', 
    'empl_telefono', 'empl_direccion', 'empl_ciudad', 
    'empl_fechaIngreso', 'empl_fechaRetiro', 'empl_estado'];

}

