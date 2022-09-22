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
        //dd($company->indhan);
        return view('KPI_Indhan.Indhan_Realisasi.index', compact ('users', 'indhan', 'indhanRealisasi'));
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
        return view('KPI_Indhan.Indhan_Realisasi.index', compact ('users', 'indhan', 'indhanRealisasi'));
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
        $indhanRealisasi->created_by = $request->created_by;
        $indhanRealisasi->timestamp;
        $indhanRealisasi->save();
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
        {
            $users = auth()->user();
            $indhan = Indhan::all();
            $indhanRealisasi = IndhanRealisasi::all();
            return redirect()->back();
        }
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
        $indhanRealisasi = IndhanRealisasi::where('id_realisasi', $id_realisasi)->first();
        $indhanRealisasi->id_indhan = $request->get('id_indhan');
        $indhanRealisasi->realisasi = $request->get('realisasi');
        $indhanRealisasi->bulan = $request->get('bulan');
        $indhanRealisasi->tahun = $request->get('tahun');
        $indhanRealisasi->kendala = $request->get('kendala');
        $indhanRealisasi->comment = $request->get('comment');
        $indhanRealisasi->timestamp;
        $indhanRealisasi->save();
        return redirect()->route('KPI_IndhanRealisasi.edit', $id_realisasi)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_realisasi)
    {
        $indhanRealisasi = IndhanRealisasi::where('id_realisasi', $id_realisasi);
        $indhanRealisasi->delete();
        return redirect()->back();
    }
}