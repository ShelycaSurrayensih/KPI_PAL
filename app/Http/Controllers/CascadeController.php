<?php

namespace App\Http\Controllers;

use App\Models\CascadeKat;
use App\Models\CascadeKpi;
use App\Models\Divisi;
use App\Models\CascadeProker;
use App\Models\CascadeRealisasi;
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

    public function cascadeKpiUpdate(Request $request, $id)
    {
        $cascade = CascadeKpi::where('id',$id)->update($request->except(['_token']));
        return redirect()->back();
    }

    //Proker
    public function cascadeProkerIndex(Request $request, $id)
    {
        $users = auth()->user();
        $casProk = CascadeProker::all();
        $prokCount = CascadeProker::where('id_CKpi', $id)->count();
        $casKpi = CascadeKpi::find($id);
        $divisi = Divisi::all();

        return view('Cascade.proker_kpi', compact('users', 'casKpi','casProk','divisi', 'prokCount'));
    }
    public function cascadeProkerStore(Request $request)
    {
        $casProk = new CascadeProker;
        $casProk->id_CKpi = $request->id_CKpi;
        $casProk->tw = $request->tw;
        $casProk->progress = $request->progress;
        $casProk->deskripsi = $request->deskripsi;
        $casProk->save();
        return redirect()->back();
    }
    public function cascadeProkerUpdate(Request $request, $id)
    {
        $cascade = CascadeProker::where('id',$id)->update($request->except(['_token']));
        return redirect()->back();
    }
}
