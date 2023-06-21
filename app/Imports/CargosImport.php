<?php

namespace App\Imports;

use App\Models\Cargos;
use Maatwebsite\Excel\Concerns\ToModel;

class CargosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         dd($row);
        return new Cargos([
        'car_idEmpresa'  => auth()->user()->empresa,
        'car_nombre' => $row[0],
        'car_nroOcupados' => $row[1], 
        'car_nroVacantes' => $row[2],
        'car_otrosFactores' => 'N', 
        'car_tipo' => '0',
        'car_salario' => $row[3], 
        'car_estado' => 'A',
        ]);
    }
}
