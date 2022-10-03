<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TupoksiDepartemen;
use App\Models\TupoksiKPI;
use App\Models\TupoksiProker;
use App\Models\TupoksiRealisasi;
use App\Models\TupoksiTw;

class TupoksiProkerController extends Controller
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
        $tupoksiProker = TupoksiProker::all();
        $tupoksiRealisasi = TupoksiRealisasi::all();
        $tupoksiTw = TupoksiTw::all();
        $tupoksiRealisasiCount = TupoksiRealisasi::count();
        //$tupoksiProker = TupoksiProker::where('id_proker', $id)->first();
        return view('Tupoksi.Proker.indexAll', compact ('users', 'tupoksiDepartemen', 'tupoksiKPI', 'tupoksiProker', 'tupoksiRealisasi', 'tupoksiTw', 'tupoksiRealisasiCount'));
    }

    public function indexProker($id)
    {
        $users = auth()->user();
        $tupoksiDepartemen = TupoksiDepartemen::all();
        $tupoksiKPI = TupoksiKPI::where('id_kpi', $id)->first();
        $tupoksiProker = TupoksiProker::all();
        //$tupoksiProker = TupoksiProker::where('id_proker', $id)->first();
        return view('Tupoksi.Proker.index', compact ('users', 'tupoksiDepartemen', 'tupoksiKPI', 'tupoksiProker'));
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
        return view('Tupoksi.Proker.index', compact ('users', 'tupoksiDepartemen', 'tupoksiKPI', 'tupoksiProker'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tupoksiProker = new TupoksiProker;
        $tupoksiProker->id_proker = $request->id_proker;
        $tupoksiProker->id_kpi = $request->id_kpi;
        $tupoksiProker->proker = $request->proker;
        $tupoksiProker->target = $request->target;
        $tupoksiProker->created_by = $request->created_by;
        $tupoksiProker->save();
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
    public function edit($id_proker)
    {
        $users = auth()->user();
        $tupoksiDepartemen = TupoksiDepartemen::all();
        $tupoksiKPI = TupoksiKPI::all();
        $tupoksiProker = TupoksiProker::all();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_proker)
    {
        $tupoksiProker = TupoksiProker::where('id_proker', $id_proker)->first();
        $tupoksiProker->proker = $request->get('proker');
        $tupoksiProker->target = $request->get('target');
        $tupoksiProker->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_proker)
    {
        $tupoksiProker = TupoksiProker::where('id_proker', $id_proker);
        $tupoksiProker->delete();
        return redirect()->back();
    }
}