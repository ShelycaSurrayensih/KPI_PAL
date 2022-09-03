<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TupoksiDepartemen;
use App\Models\TupoksiKPI;
use App\Models\TupoksiProker;
use App\Models\TupoksiRealisasi;


class TupoksiRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user();
        $tupoksiProker = TupoksiProker::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        return view('Tupoksi.Realisasi.index', compact ('users', 'tupoksiProker', 'tupoksiRealisasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = auth()->user();
        $tupoksiProker = TupoksiProker::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        return view('Tupoksi.Realisasi.index', compact ('users', 'tupoksiProker', 'tupoksiRealisasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tupoksiRealisasi = new TupoksiRealisasi;
        $tupoksiRealisasi->id_realisasi = $request->id_realisasi;
        $tupoksiRealisasi->id_proker = $request->id_proker;
        $tupoksiRealisasi->tw = $request->tw;
        $tupoksiRealisasi->progres = $request->progres;
        $tupoksiRealisasi->save();
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
        $tupoksiProker = TupoksiProker::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        return redirect()->back();
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
        $tupoksiProker = TupoksiProker::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        return redirect()->back();
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
        $tupoksiRealisasi = TupoksiRealisasi::where('id_realisasi', $id_realisasi)->first();
        $tupoksiRealisasi->id_proker = $request->get('id_proker');
        $tupoksiRealisasi->tw = $request->get('tw');
        $tupoksiRealisasi->progres = $request->get('progres');
        $tupoksiRealisasi->save();
        return redirect()->route('KPI_TupoksiRealisasi.edit', $id_realisasi)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_realisasi)
    {
        $tupoksiRealisasi = TupoksiRealisasi::where('id_realisasi', $id_realisasi);
        $tupoksiRealisasi->delete();
        return redirect()->back();
    }
}