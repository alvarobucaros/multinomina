<?php

namespace App\Exports;

use App\Models\Cargos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CargosExport implements FromCollection, WithHeadings
{
 
    public function collection()
    {
        return Cargos::all()
        ->sortBy("car_nombre");
    }
}
