<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndivKpiDir;
use App\Models\IndivPlan;
use App\Models\Divisi;
use App\Models\Direktorat;

class IndivPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user();
        $direktorat = Direktorat::all();
        $kpidir = IndivKpiDir::all();
        $indivPlan = IndivPlan::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.index', compact ('users', 'kpidir', 'direktorat','indivPlan', 'divisi'));
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
        $indivPlan = IndivPlan::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.index', compact ('users', 'kpidir', 'direktorat', 'indivPlan', 'divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $indivPlan = new IndivPlan;
        $indivPlan->id_kpidir = $request->id_kpidir;
        $indivPlan->tw= $request->tw;
        $indivPlan->prognosa = $request->prognosa;
        $indivPlan->id_divisi= $request->id_divisi;
        $indivPlan->save();
        return redirect()->route('KPI_IndivPlan.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit($id_plan)
    {
        $users = auth()->user();
        $kpidir = IndivKpiDir::all();
        $indivPlan = IndivPlan::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.Indiv_Plan.index', compact ('users', 'kpidir', 'indivPlan', 'divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_plan)
    {
        $indivPlan=IndivPlan::where('id_plan', $id_plan)->first();
        $indivPlan->id_kpidir = $request->get('id_kpidir');
        $indivPlan->tw= $request->get('tw');
        $indivPlan->prognosa = $request->get('prognosa');
        $indivPlan->id_divisi= $request->get('id_divisi');
        $indivPlan->save();
        return redirect()->route('KPI_IndivPlan.edit', $id_plan)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_plan)
    {
        $indivPlan = IndivPlan::where('id_plan', $id_plan);
        $indivPlan->delete();
        return redirect()->route('KPI_Indiv.index')
            ->with('Sukses, data berhasil dihapus');
    }
}