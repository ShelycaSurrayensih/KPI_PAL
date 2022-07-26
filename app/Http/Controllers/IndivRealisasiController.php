<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndivKpiDir;
use App\Models\IndivRealisasi;
use App\Models\Divisi;
use App\Models\Direktorat;

use Illuminate\Support\Facades\Response;
use PDF;
use Carbon\Carbon;

class IndivRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $users = auth()->user();
        $direktorat = Direktorat::all();
        $kpidir = IndivKpiDir::where('id_kpidir', $id)->first();
        $indivRealisasi = IndivRealisasi::all();
        $divisi = Divisi::all();
        return view('RKAP.index', compact ('users', 'kpidir', 'direktorat','indivRealisasi', 'divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = auth()->user();
        $direktorat = Direktorat::all();
        $kpidir = IndivKpiDir::all();
        $indivRealisasi = IndivRealisasi::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.Indiv_Realisasi.index', compact ('users', 'kpidir', 'direktorat', 'indivRealisasi', 'divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $indivRealisasi = new IndivRealisasi;
        $indivRealisasi->id_kpidir = $request->id_kpidir;
        $indivRealisasi->tw= $request->tw;
        $indivRealisasi->progres= $request->progres;
        $indivRealisasi->realisasi= $request->realisasi;
        $indivRealisasi->prognosa = $request->prognosa;
        $indivRealisasi->kendala= $request->kendala;
        $indivRealisasi->id_divisi= $request->id_divisi;

        if($request->file != Null){
            $fileName = Carbon::today()->toDateString().$request->file->getClientOriginalName();
            $request->file->move(public_path('File/Indiv'), $fileName);
        $indivRealisasi->file_evidence = $fileName;
        }
        $indivRealisasi->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_realisasi)
    {
        $users = auth()->user();
        $direktorat = Direktorat::all();
        $kpidir = IndivKpiDir::all();
        $indivRealisasi = IndivRealisasi::find($id_realisasi);
        $divisi = Divisi::all();
        return view('KPI_Indiv.Indiv_Realisasi.index', compact ('users', 'kpidir', 'direktorat', 'indivRealisasi', 'divisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_realisasi)
    {
        $users = auth()->user();
        $kpidir = IndivKpiDir::all();
        $indivRealisasi = IndivRealisasi::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.Indiv_Realisasi.index', compact ('users', 'kpidir', 'indivRealisasi', 'divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_realisasi)
    {
        $indivRealisasi=IndivRealisasi::where('id_realisasi', $id_realisasi)->first();
        $indivRealisasi->id_kpidir = $request->get('id_kpidir');
        $indivRealisasi->tw= $request->get('tw');
        $indivRealisasi->progres= $request->get('progres');
        $indivRealisasi->realisasi= $request->get('realisasi');
        $indivRealisasi->prognosa = $request->get('prognosa');
        $indivRealisasi->kendala= $request->get('kendala');
        $indivRealisasi->id_divisi= $request->get('id_divisi');
        if($request->comment != Null){
            $indivRealisasi->comment = $request->get('comment');
        }
        $indivRealisasi->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_realisasi)
    {
        $indivRealisasi = indivRealisasi::where('id_realisasi', $id_realisasi);
        $indivRealisasi->delete();
        return redirect()->back();
    }

    public function deleteComment($id)
    {
        $delete = IndivRealisasi::find($id);
        $delete->comment = 'Belum ada Komentar';
        $delete->save();
        return redirect()->back();
    }

    //View File
    public function view($file_name)
    {
        $file = $file_name;
        $path = public_path('File/Indiv/'. $file_name);
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