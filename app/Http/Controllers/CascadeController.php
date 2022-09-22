<?php

namespace App\Http\Controllers;

use App\Models\CascadeKat;
use App\Models\CascadeKpi;
use App\Models\Divisi;
use App\Models\CascadeKpiDiv;
use App\Models\CascadeProker;
use App\Models\CascadeRealisasi;
use Illuminate\Http\Request;

class CascadeController extends Controller
{
    //KPI
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
        $casKpi->cas_kpiName = $request->cas_kpiName;
        $casKpi->id_kat = $request->id_kat;
        $casKpi->bobot_kpi = $bobot_kpi;
        $casKpi->created_by = $request->created_by;
        $casKpi->save();
        return redirect()->back();
    }

    public function cascadeKpiUpdate(Request $request, $id)
    {
        $cascade = CascadeKpi::where('id',$id)->update($request->except(['_token']));
        return redirect()->back();
    }

    //KPI Divisi
    public function cascadeKpiDivIndex(Request $request, $id)
    {
        $users = auth()->user();
        $casKpiDiv = CascadeKpiDiv::all();
        $casKpiCount = CascadeKpi::all();
        $casKat = CascadeKat::all();
        $casKpi = CascadeKpi::where('id',$id)->first();
        //dd($casKpi);
        $divisi = Divisi::all();

        return view('Cascade.kpi_divisi', compact('users', 'casKpiDiv', 'casKpi','divisi', 'casKpiCount','casKat'));
    }

    public function cascadeKpiDivAll()
    {
        $users = auth()->user();
        $casKpiDiv = CascadeKpiDiv::all();
        $casKpiCount = CascadeKpi::all();
        $casKat = CascadeKat::all();
        $casKpi = CascadeKpi::all();
        $divisi = Divisi::all();

        return view('Cascade.indexAll_divisi', compact('users', 'casKpiDiv', 'casKpi','divisi', 'casKpiCount','casKat'));
    }
   
    public function cascadeKpiDivStore(Request $request)
    {
        $casKpiDiv = new CascadeKpiDiv;
        $bobot_kpi =  $request->bobot_kpi;
        $bobot_cascade = $request->bobot_cascade;
        $casKpiDiv->id_CasKpi = $request->id_CasKpi;
        $casKpiDiv->kpi_divisi = $request->kpi_divisi;
        $casKpiDiv->bobot_cascade = $bobot_cascade;
        $casKpiDiv->target = $request->target;
        $casKpiDiv->bkXbc = $bobot_kpi * ($bobot_cascade/100); 
        $casKpiDiv->status_div = $request->status_div;
        $casKpiDiv->created_by = $request->created_by;
        $casKpiDiv->save();
        return redirect()->back();
    }

    public function cascadeKpiDivUpdate(Request $request, $id)
    {
        $casKpiDiv = CascadeKpiDiv::find($id);
        $bobot_kpi =  $request->bobot_kpi;
        $bobot_cascade = $request->bobot_cascade;
        $casKpiDiv->id_CasKpi = $request->id_CasKpi;
        $casKpiDiv->kpi_divisi = $request->kpi_divisi;
        $casKpiDiv->bobot_cascade = $bobot_cascade;
        $casKpiDiv->target = $request->target;
        $casKpiDiv->bkXbc = $bobot_kpi * ($bobot_cascade/100); 
        $casKpiDiv->status_div = $request->status_div;
        $casKpiDiv->update();
        //$cascade = CascadeKpiDiv::where('id',$id)->update($request->except(['_token']));
        return redirect()->back();
    }

    //Proker
    public function cascadeProkerIndex(Request $request, $id)
    {
        $users = auth()->user();
        $casProk = CascadeProker::all();
        $prokCount = CascadeProker::where('id_CDiv', $id)->count();
        $casKpiDiv = CascadeKpiDiv::find($id);
        $divisi = Divisi::all();
        //Realisasi
        $casReal = CascadeRealisasi::all();
        $casRealCount = CascadeRealisasi::count();

        return view('Cascade.proker_kpi', compact('users', 'casKpiDiv','casProk','divisi', 'prokCount', 'casReal', 'casRealCount'));
    }
    public function cascadeProkerStore(Request $request)
    {
        $casProk = new CascadeProker;
        $casProk->id_CDiv = $request->id_CDiv;
        $casProk->tw = $request->tw;
        $casProk->progress = $request->progress;
        $casProk->deskripsi = $request->deskripsi;
        $casProk->created_by = $request->created_by;
        $casProk->save();

        $id_CDiv = $request->id_CDiv;
        $tw = $request->tw;
        $casProkDiv = CascadeProker::where('id_Cdiv', $id_CDiv)->where('tw', $tw)->first();
        $casReal = new CascadeRealisasi;
        $casReal->id_CProk = $casProkDiv->id;

        $casReal->save();

        return redirect()->back();
    }
    public function cascadeProkerUpdate(Request $request, $id)
    {
        if($request->comment != null){
            $cascade = CascadeProker::where('id',$id)->update($request->except(['_token']));
        } else{
        $casProk = CascadeProker::find($id);
        $casProk->id_CDiv = $request->id_CDiv;
        $casProk->tw = $request->tw;
        $casProk->progress = $request->progress;
        $casProk->deskripsi = $request->deskripsi;
        $casProk->comment = 'Belum ada Komentar';
        $casProk->save();
        }
        return redirect()->back();
    }

    //Cascade Realisasi
    public function cascadeRealisUpdate(Request $request, $id)
    {
        $casReal = CascadeRealisasi::where('id_CProk',$id)->first();
        $casReal->id_CProk = $request->id_CProk;
        $casReal->progress = $request->progress;
        $casReal->deskripsi = $request->deskripsi;

        if($request->file != Null){
            $fileName = $request->file->getClientOriginalName();
            $request->file->move(public_path('File'), $fileName);
        $casReal->evidence = $fileName;
        }

        //dd($casReal);
        $casReal->save();
        return redirect()->back();
    }

    public function kpiDivList($id)
    {
        $casKPI =CascadeKpi::where('id_kat',$id)->get();
        // dd($casKPI);
        return response()->json($casKPI);
    }
}
