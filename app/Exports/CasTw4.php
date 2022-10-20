<?php

namespace App\Exports;
use App\Models\CascadeKpi;
use App\Models\CascadeKpiDiv;
use App\Models\CascadeProker;
use App\Models\CascadeRealisasi;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class CasTw4 implements FromView
{

    private $data;

    

    public function view(): View
    {
        $casKpiDiv = CascadeKpiDiv::all();
        $casReal = CascadeRealisasi::all();
        $casProk = CascadeProker::all();
        $casKpi = CascadeKpi::all();
        return view('admin.cascade.tw4', compact('casKpiDiv','casReal','casProk','casKpi'));
    }
}


?>