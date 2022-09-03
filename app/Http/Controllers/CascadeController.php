<?php

namespace App\Http\Controllers;

use App\Models\CascadeKat;
use App\Models\CascadeKpi;
use App\Models\Divisi;
use Illuminate\Http\Request;

class CascadeController extends Controller
{
    public function cascadeKpiIndex(Request $request)
    {
        $users = auth()->user();
        $casKat = CascadeKat::all();
        $casKpi = CascadeKpi::all();
        $divisi = Divisi::all();

        return view('Cascade.index_kpi', compact('users', 'casKat', 'casKpi','divisi'));
    }
    public function cascadeKpiStore(Request $request)
    {
        $casKpi = new CascadeKpi;
        $bobot_kpi =  $request->bobot_kpi;
        $bobot_cascade = $request->bobot_cascade;
        $casKpi->cas_kpiName = $request->cas_kpiName;
        $casKpi->id_kat = $request->id_kat;
        $casKpi->bobot_kpi = $bobot_kpi;
        $casKpi->bobot_cascade = $bobot_cascade;
        $casKpi->bkXbc = ($bobot_kpi * $bobot_cascade);
        $casKpi->target = $request->target;
        $casKpi->div_lead = $request->div_lead;
        $casKpi->save();
        return redirect()->back();
    }
}
