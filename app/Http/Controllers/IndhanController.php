<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indhan;
use App\Models\IndhanRealisasi;
use App\Models\IndhanTim;
use App\Models\Divisi;


class IndhanController extends Controller
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
        $indhanTim = IndhanTim::all();
        $divisi = Divisi::all();
        return view('KPI_Indhan.index', compact ('users', 'indhan', 'indhanTim', 'divisi'));
    }
    
    //realisasi
    public function indhanRealisasiIndex($id)
    {
        $users = auth()->user();
        $indhan = Indhan::where('id_indhan', $id)->first();
        $indhanTim = IndhanTim::all();
        $indhanRealisasi = IndhanRealisasi::all();
        $divisi = Divisi::all();
        return view('KPI_Indhan.Indhan_Realisasi.index', compact ('users', 'indhan', 'indhanRealisasi', 'indhanTim', 'divisi'));
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
        $indhanTim = IndhanTim::all();
        $divisi = Divisi::all();
        return \view('KPI_Indhan.index', compact ('users', 'indhan', 'indhanTim', 'divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $indhan = new Indhan;
        $indhan->id_tim = $request->id_tim;
        $indhan->id_divisi = $request->id_divisi;
        $indhan->program_strategis = $request->program_strategis;
        $indhan->entitas = $request->entitas;
        $indhan->program_utama = $request->program_utama;
        $indhan->target = $request->target;
        $indhan->save();
        return redirect()->route('KPI_Indhan.create')->with('success', 'Data berhasil ditambahkan');
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
    public function edit($id_indhan)
    {
        $users = auth()->user();
        $indhan = Indhan::all();
        $indhanTim = IndhanTim::all();
        $divisi = Divisi::all();
        return view('KPI_Indhan.index', compact ('users', 'indhan', 'indhanTim', 'divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_indhan)
    {
        $indhan=Indhan::where('id_indhan', $id_indhan)->first();
        $indhan->id_tim = $request->get('id_tim');
        $indhan->id_divisi = $request->get('id_divisi');
        $indhan->program_strategis = $request->get('program_strategis');
        $indhan->entitas = $request->get('entitas');
        $indhan->program_utama = $request->get('program_utama');
        $indhan->target = $request->get('target');
        $indhan->save();
        return redirect()->route('KPI_Indhan.edit', $id_indhan)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_indhan)
    {
        $indhan = Indhan::where('id_indhan', $id_indhan);
        $indhan->delete();
        return redirect()->route('KPI_Indhan.index')
            ->with('Sukses, data berhasil dihapus');
    }
}