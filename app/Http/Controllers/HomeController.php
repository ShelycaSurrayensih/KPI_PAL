<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportExcel;
use App\Exports\BladeExport;
use App\Exports\BladeExportTupoksi;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CascadeKat;
use App\Models\CascadeKpi;
use App\Models\CascadeKpiDiv;
use App\Models\CascadeProker;
use App\Models\CascadeRealisasi;
use App\Models\Direktorat;
use App\Models\Divisi;
use App\Models\Indhan;
use App\Models\IndhanRealisasi;
use App\Models\IndhanTim;
use App\Models\IndivKpiDir;
use App\Models\IndivRealisasi;
use App\Models\InisiatifStrategis;
use App\Models\KategoriPms;
use App\Models\KpiPms;
use App\Models\planPms;
use App\Models\realisasiPms;
use App\Models\TupoksiDepartemen;
use App\Models\TupoksiKPI;
use App\Models\TupoksiProker;
use App\Models\TupoksiRealisasi;
use App\Models\TupoksiTw;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $divisi = Divisi::all();
        $casProk = CascadeProker::all();
        $casProk = CascadeProker::all()->sortBy('tw');
        // dd($casProk);
        if (Auth::User()->status == 'administrator') {
            return view('Admin.index', compact ('divisi', 'casProk'));
        } else {
            return view('user.index');
        }
    }
    
    public function print()
    {
        
        $casKpiDiv = CascadeKpiDiv::all();
        $casKpiCount = CascadeKpi::all();
        $casKat = CascadeKat::all();
        $casKpi = CascadeKpi::all();
        $divisi = Divisi::all();
        $indhan = Indhan::all();
        $indhanTim = IndhanTim::all();
        $indhanRealisasi = IndhanRealisasi::all();
        $tupoksiDepartemen = TupoksiDepartemen::all();
        $tupoksiKPI = TupoksiKPI::all();
        $tupoksiTw = TupoksiTw::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        $plan = planPms::all();
        $real = realisasiPms::all();
        $kpi = KpiPms::all();
        $kategori = KategoriPms::all();
        $inisiatif = inisiatifStrategis::all();
        $indivRealisasi = IndivRealisasi::all();
        $direktorat = Direktorat::all();
        $kpidir = IndivKpiDir::all();
        $casProk = CascadeProker::all();
        $pdf = PDF::loadview('Admin.pdf', compact('casKpiDiv','casProk','casKpiCount','casKat','casKpi','divisi','indhan','indhanTim','indhanRealisasi','tupoksiDepartemen','tupoksiKPI','tupoksiTw','tupoksiRealisasi','plan','real','kpi','kategori','inisiatif','indivRealisasi','direktorat','kpidir'))->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function export_excel()
	{
		return Excel::download(new BladeExport(), 'Cascade.xlsx');
	}
    public function export_excelTupoksi()
	{
		return Excel::download(new BladeExportTupoksi(), 'Tupoksi.xlsx');
	}
    
}