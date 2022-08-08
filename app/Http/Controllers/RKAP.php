<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\inisiatifStrategis;
use App\Models\KategoriPms;
use App\Models\KpiPms;
use App\Models\planPms;
use App\Models\realisasiPms;

class RKAP extends Controller
{
    public function createInisiatifStrategis()
    {
        return \view('RKAP.create_inisiatif');
    }

    public function inisiatifStrategisStore(Request $request)
    {
        $init = new inisiatifStrategis;
        $init->inisiatif_desc = $request->inisiatif_desc;
        $init->tahun_inisiatif = $request->tahun_inisiatif;

        return view('RKAP.create_inisiatif');
    }

    public function inisiatifStrategisIndex(Request $request)
    {
        $users = auth()->user();
        $inisiatif = inisiatifStrategis::all();

        return view('RKAP.index_inisiatif', compact('inisiatif', 'users'));
    }

    public function KategoriPmsStore(Request $request)
    {
        $kategori = KategoriPms::all();
        $kategori->kat_desc = $request->kat_desc;


        return view('RKAP.create_kategori', compact ('users', 'korporasi'));
    }

    public function KategoriPmsIndex()
    {
        $users = auth()->user();
        $kategori = KategoriPms::all();

        return view('RKAP.index_kategori', compact ('users', 'kategori'));
    }
    
    public function kpi_pmsStore(Request $request)
    {
        $kpi = KpiPms::all();
        $kpi->sub_kat = $request->sub_kat;
        $kpi->kpi_desc = $request->kpi_desc;
        $kpi->polaritas = $request->polaritas;
        $kpi->bobot = $request->bobot;
        $kpi->target = $request->target;
        $kpi->staging = $request->staging;
        $kpi->tahun_kpipms = $request->tahun_kpippms;


        return view('RKAP.create_inisiatif', compact ('users', 'korporasi'));
    }
    public function kpi_pmsIndex()
    {
        $users = auth()->user();
        $kpi = KpiPms::all();
        $kategori = KategoriPms::all();
        $inisiatif = inisiatifStrategis::all();

        return view('RKAP.index_kpi_pms', compact ('users', 'kpi', 'kategori', 'inisiatif'));
    }

    public function plan_pmsStore(Request $request)
    {
        $plan = planPms::all();
        $plan->tw = $request->tw;
        $plan->progress_plan = $request->progress_plan;
        $plan->desc_progress = $request->desc_progress;


        return view('RKAP.create_inisiatif', compact ('users', 'korporasi'));
    }

    public function plan_pmsIndex()
    {
        $users = auth()->user();
        $plan = planPms::all();
        $kpi = KpiPms::all();

        return view('RKAP.index_plan', compact ('users', 'kpi', 'plan'));
    }
    public function real_pmsStore(Request $request)
    {
        $real = realisasiPms::all();
        $real->progres_real = $request->progres_real;
        $real->desc_real = $request->desc_real;
        $real->kendala = $request->kendala;
        $real->file_evidence = $request->file_evidence;
        


        return view('RKAP.create_inisiatif', compact ('users', 'korporasi'));
    }

    public function real_pmsIndex()
    {
        $users = auth()->user();
        $real = realisasiPms::all();
        $plan = planPms::all();

        return view('RKAP.index_plan', compact ('users', 'real', 'plan'));
    }
}
