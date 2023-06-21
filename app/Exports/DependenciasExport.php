<?php

namespace App\Exports;

use App\Models\Dependencias;
use Maatwebsite\Excel\Concerns\FromCollection;

class DependenciasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dependencias::all()
        ->sortBy("dep_nombre");
    }
}
