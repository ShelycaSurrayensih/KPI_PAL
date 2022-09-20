<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TupoksiDepartemen;
use App\Models\TupoksiKPI;
use App\Models\TupoksiProker;
use App\Models\TupoksiTw;

class TwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $users = auth()->user();
        $tupoksiDepartemen = TupoksiDepartemen::all();
        $tupoksiKPI = TupoksiKPI::all();
        $tupoksiProker = TupoksiProker::where('id_proker', $id)->first();
        $twCount = TupoksiTw::where('id_proker', $id)->count();
        $tupoksiTw = TupoksiTw::all();
        return view('Tupoksi.Proker.Tw.index', compact ('users', 'tupoksiDepartemen', 'tupoksiKPI', 'tupoksiProker', 'tupoksiTw', 'twCount'));
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
        $tupoksiProker = TupoksiProker::all();
        $tupoksiTw = TupoksiTw::all();
        return view('Tupoksi.Proker.Tw.index', compact ('users', 'tupoksiDepartemen', 'tupoksiKPI', 'tupoksiProker', 'tupoksiTw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tupoksiTw = new TupoksiTw;
        $tupoksiTw->id_proker = $request->id_proker;
        $tupoksiTw->tw = $request->tw;
        $tupoksiTw->deskripsi = $request->deskripsi;
        $tupoksiTw->progres = $request->progres;
        $tupoksiTw->save();
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
        $tupoksiProker = TupoksiProker::all();
        $tupoksiTw = TupoksiTw::all();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tw)
    {
        $tupoksiTw = TupoksiTw::where('id_tw', $id_tw)->first();
        $tupoksiTw->id_proker = $request->get('id_proker');
        $tupoksiTw->tw = $request->get('tw');
        $tupoksiTw->deskripsi = $request->get('deskripsi');
        $tupoksiTw->progres = $request->get('progres');
        $tupoksiTw->save();
        return redirect()->route('KPI_TupoksiTw.edit', $id_tw)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tw)
    {
        $tupoksiTw = TupoksiTw::where('id_tw', $id_tw);
        $tupoksiTw->delete();
        return redirect()->back();
    }
}
