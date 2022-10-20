<?php

namespace App\Exports;
use App\Models\CascadeRealisasi;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExcel implements FromView
// FromArray, WithHeadings, ShouldAutoSize
{
    public function view():view{
        return view('export.invoices', [
            'invoices' => Invoice::all()
        ]);
    }
    // protected $cascade;
    
    // public function __construct(array $cascade)
    // {
    //     $this->cascade = $cascade;
    // }
    // public function array(): array
    // {
    //     return $this->cascade;
    // }


    // public function headings(): array
    // {
    //     return [
    //         'No',
    //         'KPI KORPORASI + TRANSFORMASI',
    //         'KPI DIVISI',
    //         'BOBOT KPI',
    //         'BOBOT CASCADING',
    //         'TARGET KPI',
    //         'TARGET PROKER',
    //         'TW',
    //         'TW1',
    //         'SKOR KPI',
    //         'SKOR PROKER',
    //         'KENDALA',
    //     ];
    // }
}
