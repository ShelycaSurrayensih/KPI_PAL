<?php

namespace App\Exports;
use App\Models\CascadeKpi;
use App\Models\CascadeKpiDiv;
use App\Models\CascadeProker;
use App\Models\CascadeRealisasi;
use App\Models\Divisi;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class CasTw2 implements FromView
{

    private $data;

    

    public function view(): View
    {
        $casKpiDiv = CascadeKpiDiv::all();
        $casReal = CascadeRealisasi::all();
        $casProk = CascadeProker::all();
        $casKpi = CascadeKpi::all();
        $divisi = Divisi::all();
        return view('admin.cascade.tw2', compact('casKpiDiv','casReal','casProk','casKpi', 'divisi'));
    }
}


?>