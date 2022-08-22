<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndivKpiDir;
use App\Models\Divisi;
use App\Models\Direktorat;
use App\Models\IndivRealisasi;

class IndivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user();
        $kpidir = IndivKpiDir::all();
        $direktorat = Direktorat::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.index', compact ('users', 'kpidir', 'direktorat', 'divisi'));
    }
    
    //Realisasi
    //
    //
    public function realisasiIndex($id)
    {
        $users = auth()->user();
        $direktorat = Direktorat::all();
        $kpidir = IndivKpiDir::where('id_kpidir', $id)->first();
        $indivRealisasi = IndivRealisasi::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.Indiv_Realisasi.index', compact ('users', 'kpidir', 'direktorat','indivRealisasi', 'divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = auth()->user();
        $kpidir = IndivKpiDir::all();
        $direktorat = Direktorat::all();
        $divisi = Divisi::all();
        return \view('KPI_indiv.index', compact ('users', 'kpidir', 'direktorat', 'divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_direktorat' => 'required',
            'id_divisi' => 'required',
            'desc_kpidir' => 'required',
            'satuan' => 'required',
            'target' => 'required',
            'bobot' => 'required',
            'ket' => 'required',
            'asal_kpi' => 'required',
            
        ]);

        $kpidir = new IndivKpiDir;
        $kpidir->id_direktorat = $request->get('id_direktorat');
        $kpidir->id_divisi = $request->get('id_divisi');
        $kpidir->desc_kpidir = $request->get('desc_kpidir');
        $kpidir->satuan = $request->get('satuan');
        $kpidir->target = $request->get('target');
        $kpidir->bobot = $request->get('bobot');
        $kpidir->ket = $request->get('ket');
        $kpidir->asal_kpi = $request->get('asal_kpi');
        $kpidir->timestamp;
        $kpidir->save();
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
    public function edit($id_kpidir)
    {
        $users = auth()->user();
        $kpidir = IndivKpiDir::all();
        $direktorat = Direktorat::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.index', compact ('users', 'kpidir', 'direktorat', 'divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kpidir)
    {
        $request->validate([
            'id_direktorat' => 'required',
            'id_divisi' => 'required',
            'desc_kpidir' => 'required',
            'satuan' => 'required',
            'target' => 'required',
            'bobot' => 'required',
            'ket' => 'required',
            'asal_kpi' => 'required',
            
        ]);

        $kpidir=IndivKpiDir::where('id_kpidir', $id_kpidir)->first();
        $kpidir->id_direktorat = $request->get('id_direktorat');
        $kpidir->id_divisi = $request->get('id_divisi');
        $kpidir->desc_kpidir = $request->get('desc_kpidir');
        $kpidir->satuan = $request->get('satuan');
        $kpidir->target = $request->get('target');
        $kpidir->bobot = $request->get('bobot');
        $kpidir->ket = $request->get('ket');
        $kpidir->asal_kpi = $request->get('asal_kpi');
        $kpidir->timestamp;
        $kpidir->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kpidir)
    {
        $kpidir = IndivKpiDir::where('id_kpidir', $id_kpidir);
        $kpidir->delete();
        return redirect()->back();
    }
}