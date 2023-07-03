<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidaciones extends Model
{
    use HasFactory;
    protected $table = "liquidaciones";

    protected $fillable = ['id', 'liq_idEmpresa', 'liq_tipo', 
    'liq_fechaDesde', 'liq_fechaHasta', 'liq_estado','liq_idEmpleado',
    'liq_periodo'] ;
}
