<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportExcel;
use App\Exports\CasTw1;
use App\Exports\CasTw2;
use App\Exports\CasTw3;
use App\Exports\CasTw4;
use App\Exports\TupTw1;
use App\Exports\TupTw2;
use App\Exports\TupTw3;
use App\Exports\TupTw4;
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

use DB;
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
        $casReal = CascadeRealisasi::all();
        $casProk = CascadeProker::all();
        $tupoksiProker = TupoksiProker::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        $tupoksiTw = TupoksiTw::all();
        $casDiv = CascadeKpiDiv::all();
        $divisi_name = Divisi::all()->pluck('id_divisi', 'div_name');
        $casRealProg =DB::table('cascade_realisasis')
                        ->select('created_by', DB::raw("SUM(progress) as total"),)
                        ->groupBy('created_by');
        // $casRealDesk = $casRealProg->pluck('created_by', 'deskripsi');
        // $count = 0;
        $progress = $casRealProg->pluck('total');
        $check_id = $casRealProg->pluck('created_by');
        $divCount = Divisi::all()->count();
        
        $labels = $divisi_name->keys();
        $val = $divisi_name->values();
        
        $bkXbc=DB::table('cascade_kpi_divs')
                ->select('created_by', DB::raw("SUM(bkXbc) as total"),)
                ->groupBy('created_by');
        $bobot = $bkXbc->pluck('created_by', 'total');
        // $bobTot = $bkXbc->pluck('total');

         //dd($bobot);
        if (Auth::User()->status == 'administrator') {
            return view('Admin.index', compact ('divisi','casDiv', 'casReal', 'casProk', 'tupoksiProker', 'tupoksiRealisasi', 'tupoksiTw', 'labels', 'val', 'progress', 'check_id', 'divisi_name', 'bobot'));
        } else {
            return view('user.index');
        }
    }



    public function CasTw1()
	{
		return Excel::download(new CasTw1(), 'Cascade Tw 1.xlsx');
	}
    public function CasTw2()
	{
		return Excel::download(new CasTw2(), 'Cascade Tw 2.xlsx');
	}
    public function CasTw3()
	{
		return Excel::download(new CasTw3(), 'Cascade Tw 3.xlsx');
	}
    public function CasTw4()
	{
		return Excel::download(new CasTw4(), 'Cascade Tw 4.xlsx');
	}
    public function TupTw1()
	{
		return Excel::download(new TupTw1(), 'Tupoksi Tw 1.xlsx');
	}
    public function TupTw2()
	{
		return Excel::download(new TupTw2(), 'Tupoksi Tw 2.xlsx');
	}
    public function TupTw3()
	{
		return Excel::download(new TupTw3(), 'Tupoksi Tw 3.xlsx');
	}
    public function TupTw4()
	{
		return Excel::download(new TupTw4(), 'Tupoksi Tw 4.xlsx');
	}

    public function barchart(Request $request)
    {
        $divisi = Divisi::all();
        $casReal = CascadeRealisasi::all();
        $casProk = CascadeProker::all();
        $tupoksiProker = TupoksiProker::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        $tupoksiTw = TupoksiTw::all();
    	
    	return view('Admin.index', compact ('divisi', 'casReal', 'casProk', 'tupoksiProker', 'tupoksiRealisasi', 'tupoksiTw'));
    }
    
}