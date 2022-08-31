<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TupoksiDepartemen;
use App\Models\TupoksiKPI;

class TupoksiKPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user();
        $tupoksiDepartemen = TupoksiDepartemen::all();
        $tupoksiKPI = TupoksiKPI::all();
        //dd($company->indhan);
        return view('Tupoksi.KPI.index', compact ('users', 'tupoksiDepartemen', 'tupoksiKPI'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = auth()->user();
        $tupoksiDepartemen = TupoksiDepartemen::all();
        $tupoksiKPI = TupoksiKPI::all();
        //dd($company->indhan);
        return view('Tupoksi.KPI.index', compact ('users', 'tupoksiDepartemen', 'tupoksiKPI'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tupoksiKPI = new TupoksiKPI;
        $tupoksiKPI->id_departemen = $request->id_departemen;
        $tupoksiKPI->kpi = $request->kpi;
        $tupoksiKPI->save();
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
    public function edit($id)
    {
        $users = auth()->user();
        $tupoksiDepartemen = TupoksiDepartemen::all();
        $tupoksiKPI = TupoksiKPI::all();
        return redirect()->back();
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
        $tupoksiKPI = TupoksiKPI::where('id_kpi', $id_kpi)->first();
        $tupoksiKPI->id_departemen = $request->get('id_departemen');
        $tupoksiKPI->kpi = $request->get('kpi');
        $tupoksiKPI->save();
        return redirect()->route('KPI_TupoksiKpi.edit', $id_kpi)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tupoksiKPI = TupoksiKPI::where('id_kpi', $id_kpi);
        $tupoksiKPI->delete();
        return redirect()->back();
    }
}
