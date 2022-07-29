<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndivKpiDir;

class KpiController extends Controller
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
        return view('KPI_Indiv.create', compact ('users', 'kpidir'));
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
        return \view('KPI_indiv.create', compact ('users', 'kpidir'));
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
            'desc_kipdir' => 'required',
            'satuan' => 'required',
            'target' => 'required',
            'bobot' => 'required',
            'ket' => 'required',
            'asal_kpi' => 'required',
            'alasan' => 'required',
        ]);

        $kpidir = new IndivKpiDir;
        $kpidir->id_direktorat = $request->get('id_direktorat');
        $kpidir->id_divisi = $request->get('id_divisi');
        $kpidir->desc_kipdir = $request->get('desc_kipdir');
        $kpidir->satuan = $request->get('satuan');
        $kpidir->target = $request->get('target');
        $kpidir->bobot = $request->get('bobot');
        $kpidir->ket = $request->get('ket');
        $kpidir->asal_kpi = $request->get('asal_kpi');
        $kpidir->alasan = $request->get('alasan');
        $kpidir->save();
        return redirect()->route('KPI_indiv.create')->with('success', 'Data berhasil ditambahkan');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
