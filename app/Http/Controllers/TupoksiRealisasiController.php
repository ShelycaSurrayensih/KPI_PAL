<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TupoksiDepartemen;
use App\Models\TupoksiKPI;
use App\Models\TupoksiTw;
use App\Models\TupoksiRealisasi;
use Carbon\Carbon;

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
        $tupoksiTw = TupoksiTw::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        return view('Tupoksi.Proker.Tw.index', compact ('users', 'tupoksiTw', 'tupoksiRealisasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = auth()->user();
        $tupoksiTw = TupoksiTw::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        return view('Tupoksi.Proker.Tw.index', compact ('users', 'tupoksiTw', 'tupoksiRealisasi'));
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
        $tupoksiRealisasi->id_tw = $request->id_tw;
        $tupoksiRealisasi->progres = $request->progres;
        $tupoksiRealisasi->deskripsi = $request->deskripsi;
        $tupoksiRealisasi->kendala = $request->kendala;
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
        $tupoksiTw = TupoksiTw::all();
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
        $tupoksiTw = TupoksiTw::all();
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
        $tupoksiRealisasi->id_tw = $request->get('id_tw');
        $tupoksiRealisasi->progres = $request->get('progres');
        $tupoksiRealisasi->deskripsi = $request->get('deskripsi');
        $tupoksiRealisasi->kendala = $request->get('kendala');
        $tupoksiRealisasi->comment = $request->get('comment');
        if($request->file != Null){
            $fileName = Carbon::today()->toDateString().$request->file->getClientOriginalName();
            $request->file->move(public_path('File/Tupoksi'), $fileName);
        $tupoksiRealisasi->file_evidence = $fileName;
        }
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

    public function deleteComment($id)
    {
        $plan = TupoksiRealisasi::where('id_realisasi', $id)->first();
        $plan->comment = 'Belum ada Komentar';
        $plan->save();
        return redirect()->back();
    }
}