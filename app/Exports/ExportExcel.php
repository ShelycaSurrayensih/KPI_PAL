<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Direktorat::all();
    }
}
