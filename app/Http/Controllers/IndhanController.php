<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indhan;
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
        return view('KPI_Indhan.Indhan.create', compact ('users', 'indhan', 'indhanTim', 'divisi'));
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
        return \view('KPI_Indhan.Indhan.create', compact ('users', 'indhan', 'indhanTim', 'divisi'));
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