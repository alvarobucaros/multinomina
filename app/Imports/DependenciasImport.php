<?php

namespace App\Imports;

use App\Models\Dependencias;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DependenciasImport implements ToModel, WithHeadingRow
{
 
    public function model(array $row)
    {
        // dd($row);
        return new Dependencias([
            'dep_idEmpresa'  => auth()->user()->empresa,
            'dep_nombre' => $row['nombre'],
            'dep_estado' => 'A',
        ]);
    }
}
