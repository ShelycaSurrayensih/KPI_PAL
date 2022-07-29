<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indhan;
use App\Models\IndhanRealisasi;

class IndhanRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user();
        $indhan = Indhan::all();
        $indhanRealisasi = IndhanRealisasi::all();
        return view('KPI_Indhan.Indhan_Realisasi.create', compact ('users', 'indhan', 'indhanRealisasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = auth()->user();
        $indhan = Indhan::all();
        $indhanRealisasi = IndhanRealisasi::all();
        return view('KPI_Indhan.Indhan_Realisasi.create', compact ('users', 'indhan', 'indhanRealisasi'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $indhanRealisasi = new IndhanRealisasi;
        $indhanRealisasi->id_indhan = $request->id_indhan;
        $indhanRealisasi->realisasi = $request->realisasi;
        $indhanRealisasi->bulan = $request->bulan;
        $indhanRealisasi->tahun = $request->tahun;
        $indhanRealisasi->kendala = $request->kendala;
        $indhanRealisasi->tgl_input = $request->tgl_input;
        $indhanRealisasi->save();
        return redirect()->route('KPI_IndhanRealisasi.create')->with('success', 'Data berhasil ditambahkan');
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