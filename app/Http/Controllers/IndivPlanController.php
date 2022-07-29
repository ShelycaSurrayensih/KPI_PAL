<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndivKpiDir;
use App\Models\IndivPlan;
use App\Models\Divisi;

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
        $kpidir = IndivKpiDir::all();
        $indivPlan = IndivPlan::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.Indiv_Plan.create', compact ('users', 'kpidir', 'indivPlan', 'divisi'));
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
        $indivPlan = IndivPlan::all();
        $divisi = Divisi::all();
        return view('KPI_Indiv.Indiv_Plan.create', compact ('users', 'kpidir', 'indivPlan', 'divisi'));
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
        return redirect()->route('KPI_IndivPlan.create')->with('success', 'Data berhasil ditambahkan');
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