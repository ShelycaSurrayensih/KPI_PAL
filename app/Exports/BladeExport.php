<?php

namespace App\Exports;
use App\Models\CascadeKpi;
use App\Models\IndhanTim;
use App\Models\CascadeKpiDiv;
use App\Models\CascadeProker;
use App\Models\CascadeRealisasi;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class BladeExport implements FromView
{

    private $data;

    

    public function view(): View
    {
        $casKpiDiv = CascadeKpiDiv::all();
        $casReal = CascadeRealisasi::all();
        $casProk = CascadeProker::all();
        $casKpi = CascadeKpi::all();
        $indhanTim = IndhanTim::all();
        return view('admin.excelCascade', compact('casKpiDiv','casReal','casProk','casKpi', 'indhanTim'));
    }
}


?>