<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndhanTim;
use App\Models\Divisi;

class IndhanTimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user();
        $indhanTim = IndhanTim::all();
        $divisi = Divisi::all();
        return view('KPI_Indhan.Indhan_Tim.index', compact ('users', 'indhanTim', 'divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = auth()->user();
        $indhanTim = IndhanTim::all();
        $divisi = Divisi::all();
        return view('KPI_Indhan.Indhan_Tim.index', compact ('users', 'indhanTim', 'divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Tim' => 'required',
            'id_divisi' => 'required',
        ]);

        $indhanTim = new IndhanTim;
        $indhanTim->Tim = $request->get('Tim');
        $indhanTim->id_divisi = $request->get('id_divisi');
        $indhanTim->save();
        return redirect()->route('KPI_IndhanTim.create')->with('success', 'Data berhasil ditambahkan');
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
    public function edit($id_tim)
    {
        $users = auth()->user();
        $indhanTim = IndhanTim::all();
        $divisi = Divisi::all();
        return view('KPI_Indhan.Indhan_Tim.index', compact ('users', 'indhanTim', 'divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tim)
    {
        $indhanTim=IndhanTim::where('id_tim', $id_tim)->first();
        $indhanTim->Tim = $request->get('Tim');
        $indhanTim->id_divisi = $request->get('id_divisi');
        $indhanTim->save();
        return redirect()->route('KPI_IndhanTim.edit', $id_tim)->with('success', 'Data berhasil ditambahkan');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tim)
    {
        $indhanTim = IndhanTim::where('id_tim', $id_tim);
        $indhanTim->delete();
        return redirect()->route('KPI_IndhanTim.index')
            ->with('Sukses, data berhasil dihapus');
    }
}