<?php

namespace App\Imports;

use App\Models\Cargos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CargosImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
        //dd($row);
        return new Cargos([
        'car_idEmpresa'  => auth()->user()->empresa,
        'car_nombre' => $row['nombre'],
        'car_nroOcupados' => $row['nroocupados'], 
        'car_nroVacantes' => $row['nrovacantes'],
        'car_otrosFactores' => 'N', 
        'car_tipo' => '0',
        'car_salario' => $row['salario'], 
        'car_estado' => 'A',
        ]);
    }
}
