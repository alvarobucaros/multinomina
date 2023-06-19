<?php

namespace App\Exports;
 
use App\Models\Empleados;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmpleadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Empleados::all()
        ->sortBy("empl_primerApellido")
        ->sortBy('empl_primerNombre');
        
    }
}
