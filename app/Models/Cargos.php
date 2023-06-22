<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;
    protected $table = "cargos";

    protected $fillable = ['id','car_idEmpresa','car_nombre',
    'car_nroOcupados','car_nroVacantes','car_otrosFactores',
    'car_tipo','car_estado','car_salario'] ;
}
