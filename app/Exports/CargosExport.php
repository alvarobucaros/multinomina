<?php

namespace App\Exports;

use App\Models\Cargos;
use Maatwebsite\Excel\Concerns\FromCollection;

class CargosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cargos::all()
        ->sortBy("car_nombre");
    }
}
