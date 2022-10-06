<?php

namespace App\Exports;
use App\Models\CascadeKpi;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExcel implements FromArray, WithHeadings, ShouldAutoSize
{
    protected $cascade;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(array $cascade)
    {
        $this->cascade = $cascade;
    }
    public function array(): array
    {
        return $this->cascade;
    }


    public function headings(): array
    {
        return [
            'No',
            'KPI',
        ];
    }
}
