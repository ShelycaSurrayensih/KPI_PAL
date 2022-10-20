<?php

namespace App\Exports;
use App\Models\TupoksiDepartemen;
use App\Models\TupoksiKPI;
use App\Models\TupoksiProker;
use App\Models\TupoksiRealisasi;
use App\Models\TupoksiTw;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class TupTw4 implements FromView
{

    private $data;

    

    public function view(): View
    {
        $tupoksiDepartemen = TupoksiDepartemen::all();
        $tupoksiKPI = TupoksiKPI::all();
        $tupoksiTw = TupoksiTw::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        $tupoksiProker = TupoksiProker::all();
        return view('admin.tupoksi.tw4', compact('tupoksiDepartemen','tupoksiKPI','tupoksiTw','tupoksiRealisasi', 'tupoksiProker'));
    }
}


?>