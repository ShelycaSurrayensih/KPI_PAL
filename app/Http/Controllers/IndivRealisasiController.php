<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndivKpiDir;
use App\Models\IndivRealisasi;
use App\Models\Divisi;
use App\Models\Direktorat;

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
        $indivRealisasi->keterangan= $request->keterangan;
        $indivRealisasi->id_divisi= $request->id_divisi;
        $indivRealisasi->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $indivRealisasi->keterangan= $request->get('keterangan');
        $indivRealisasi->id_divisi= $request->get('id_divisi');
        $indivRealisasi->comment= $request->get('comment');
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
}