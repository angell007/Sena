<?php

namespace App\Exports;

use App\Ambiente;
use Maatwebsite\Excel\Concerns\FromCollection;

class AmbienteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ambiente::all();
    }
}
