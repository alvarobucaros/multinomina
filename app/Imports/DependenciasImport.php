<?php

namespace App\Imports;

use App\Models\Dependencias;
use Maatwebsite\Excel\Concerns\ToModel;

class DependenciasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dependencias([
            'dep_idEmpresa'  => auth()->user()->empresa,
            'dep_nombre' => $row[0],
            'dep_estado' => 'A',
        ]);
    }
}
