<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use App\Models\InisiatifStrategis;
use App\Models\KategoriPms;
use App\Models\KpiPms;
use App\Models\planPms;
use App\Models\realisasiPms;
use App\Models\Divisi;
use Illuminate\Support\Facades\Response;
use PDF;

class RKAP extends Controller
{
    //Overview
    public function overviewIndex(Request $request)
    {
        $users = auth()->user();
        $kpi = KpiPms::all();
        $kategori = KategoriPms::all();
        $inisiatif = inisiatifStrategis::all();
        $divisi = Divisi::all();
        $plan = planPms::all();
        $real = realisasiPms::all();
        return view('RKAP.overview', compact ('users', 'kpi', 'kategori', 'inisiatif', 'divisi', 'real', 'plan'));
    }
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

    public function inisiatifStrategisUpdate(Request $request, $id_inisiatif)
    {
        $init = InisiatifStrategis::where('id_inisiatif',$id_inisiatif)->update($request->except(['_token']));
        return redirect()->back();
    }
    public function inisiatifStrategisDelete($id)
    {
        $init = inisiatifStrategis::where('id_inisiatif', $id);
        $init->delete();
        return redirect()->back()
            ->with('Sukses, data berhasil dihapus');
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
    
    public function KategoriPmsUpdate(Request $request, $id)
    {
        $init = KategoriPms::where('id_kat',$id)->update($request->except(['_token']));
        return redirect()->back();
    }
    public function KategoriPmsDelete($id)
    {
        $kategori = KategoriPms::where('id_kat', $id);
        $kategori->delete();
        return redirect()->back()
            ->with('Sukses, data berhasil dihapus');
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
        $kpi->created_by = $request->created_by;
        $kpi->timestamp;
        $kpi->save();
        return redirect()->route('kpi_pms.index');
    }
    public function kpi_pmsUpdate(Request $request, $id)
    {
        $kpi = KpiPms::where('id_kpipms',$id)->update($request->except(['_token']));
        return redirect()->back();
    }
    public function kpi_pmsIndex()
    {
        $users = auth()->user();
        $kpi = KpiPms::all();
        $kategori = KategoriPms::all();
        $inisiatif = inisiatifStrategis::all();
        $divisi = Divisi::all();
        $plan = planPms::all();
        return view('RKAP.index_kpi_pms', compact ('users', 'kpi', 'kategori', 'inisiatif', 'divisi', 'plan'));
    }
    public function kpi_pmsDelete($id)
    {
        $kpi = KpiPms::where('id_kpipms', $id);
        $kpi->delete();
        return redirect()->back()
            ->with('Sukses, data berhasil dihapus');
    }


    //Plan PMS
    public function plan_pmsStore(Request $request)
    {
        $plan = new planPms;
        $plan->id_kpipms = $request->get('id_kpipms');
        $plan->progress_plan = $request->get('progress_plan');
        $plan->bulan = $request->get('bulan');
        $plan->tahun = $request->get('tahun');
        $plan->desc_plan = $request->get('desc_plan');
        $plan->created_by = $request->get('created_by');
        $plan->save();
        return redirect()->back();
    }
    public function plan_pmsUpdate(Request $request, $id)
    {
        $init = planPms::where('id_plan',$id)->update($request->except(['_token']));
        return redirect()->back();
    }
    public function plan_pmsIndex($id_kpipms)
    {
        $users = auth()->user();
        $divisi = Divisi::all();
        $plan = planPms::all();
        $kpi = KpiPms::where('id_kpipms', $id_kpipms)->first();
        $kategori = KategoriPms::all();
        $real = realisasiPms::all();
        $inisiatif = inisiatifStrategis::all();
        $realCount = realisasiPms::count();
        return view('RKAP.index_plan', compact ('users', 'kpi', 'plan', 'real','inisiatif','kategori', 'divisi', 'realCount'));
        
    }
    public function plan_pmsDelete($id)
    {
        $plan = planPms::where('id_plan', $id);
        $plan->delete();
        return redirect()->back()
            ->with('Sukses, data berhasil dihapus');
    }

    //Realisasi PMS
    public function real_pmsStore(Request $request)
    {
        $real = new realisasiPms;
        $real->id_plan = $request->id_plan;
        $real->progress_real = $request->progress_real;
        $real->desc_real = $request->desc_real;
        $real->keterangan = $request->keterangan;

        if($request->file != Null){
            $fileName = $request->file->getClientOriginalName();
            $request->file->move(public_path('File/RKAP'), $fileName);
        $real->file_evidence = $fileName;
        }
        $real->save(); 
        return redirect()->back();
    }
    
    public function real_pmsUpdate(Request $request, $id)
    {
        $real = realisasiPms::where('id_real',$id)->update($request->except(['_token']));
        return redirect()->back();
    }
    public function real_pmsIndex($id)
    {
        $users = auth()->user();
        $real = realisasiPms::all();
        $plan = planPms::where('id_plan', $id)->first();

        return view('RKAP.index_realisasi', compact ('users', 'real', 'plan'));
    }
    public function real_pmsDestroy($id_real)
    {
        $real = realisasiPms::where('id_real', $id_real);
        $real->delete();
        return redirect()->route('realpms.index')
            ->with('Sukses, data berhasil dihapus');
    }

    public function deleteComment($id)
    {
        $delete = planPms::find($id);
        $delete->comment = 'Belum ada Komentar';
        $delete->save();
        return redirect()->back();
    }

    //View File
    public function view($file_name)
    {
        $file = $file_name;
        $path = public_path('File/RKAP/'. $file_name);
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::file($path);
        
    }

    //Download File
    public function download($file_name)
    {
        $file = $file_name;
        $path = public_path('File/RKAP/'. $file_name);
        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($path, $file, $headers);
        
    }
}