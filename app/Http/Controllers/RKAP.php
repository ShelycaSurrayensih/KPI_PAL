<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\inisiatifStrategis;
use App\Models\KategoriPms;
use App\Models\KpiPms;
use App\Models\planPms;
use App\Models\realisasiPms;
use App\Models\Divisi;

class RKAP extends Controller
{
    //Inisiatif Strategis
    public function inisiatifStrategisStore(Request $request)
    {
        $init = new inisiatifStrategis;
        $init->inisiatif_desc = $request->inisiatif_desc;
        $init->tahun_inisiatif = $request->tahun_inisiatif;
        $init->save();
        return redirect()->route('inisiatifStrategis.index');
    }
    public function inisiatifStrategisIndex(Request $request)
    {
        $users = auth()->user();
        $inisiatif = inisiatifStrategis::all();

        return view('RKAP.index_inisiatif', compact('inisiatif', 'users'));
    }

    //Kategori PMS
    public function KategoriPmsStore(Request $request)
    {
        $kategori = new KategoriPms;
        $kategori->kat_desc = $request->kat_desc;
        $kategori->ket = $request->ket;
        $kategori->save();
        return redirect()->route('KategoriPms.index');
    }

    public function KategoriPmsIndex()
    {
        $users = auth()->user();
        $kategori = KategoriPms::all();

        return view('RKAP.index_kategori', compact ('users', 'kategori'));
    }
    
    //KPI PMS
    public function kpi_pmsStore(Request $request)
    {
        $kpi = new KpiPms;
        $kpi->id_kat = $request->id_kat;
        $kpi->id_inisiatif = $request->id_inisiatif;
        $kpi->sub_kat = $request->sub_kat;
        $kpi->kpi_desc = $request->kpi_desc;
        $kpi->polaritas = $request->polaritas;
        $kpi->bobot = $request->bobot;
        $kpi->target = $request->target;
        $kpi->div_lead = $request->div_lead;
        $kpi->tahun_kpipms = $request->tahun_kpippms;
        $kpi->save();
        return redirect()->route('kpi_pms.index');
    }
    public function kpi_pmsIndex()
    {
        $users = auth()->user();
        $kpi = KpiPms::all();
        $kategori = KategoriPms::all();
        $inisiatif = inisiatifStrategis::all();
        $divisi = Divisi::all();
        return view('RKAP.index_kpi_pms', compact ('users', 'kpi', 'kategori', 'inisiatif', 'divisi'));
    }

    //Plan PMS
    public function plan_pmsStore(Request $request)
    {
        $plan = new planPms;
        $plan->id_kpipms = $request->id_kpipms;
        $plan->tw = $request->tw;
        $plan->progress_plan = $request->progress_plan;
        $plan->desc_progress = $request->desc_progress;
        $plan->save();
        return redirect()->route('planpms.index');
    }
    public function plan_pmsIndex()
    {
        $users = auth()->user();
        $plan = planPms::all();
        $kpi = KpiPms::all();
        $inisiatif = inisiatifStrategis::all();
        return view('RKAP.index_plan', compact ('users', 'kpi', 'plan','inisiatif'));
    }

    //Realisasi PMS
    public function real_pmsStore(Request $request)
    {
        $real = new realisasiPms;
        $real->id_plan = $request->id_plan;
        $real->progres_real = $request->progres_real;
        $real->desc_real = $request->desc_real;
        $real->kendala = $request->kendala;
        $real->file_evidence = $request->file_evidence;
        $real->save();
        return redirect()->route('realpms.index');
    }
    public function real_pmsIndex()
    {
        $users = auth()->user();
        $real = realisasiPms::all();
        $plan = planPms::all();

        return view('RKAP.index_realisasi', compact ('users', 'real', 'plan'));
    }
}
