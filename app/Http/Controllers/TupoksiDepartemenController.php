<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TupoksiDepartemen;
use App\Models\Divisi;

class TupoksiDepartemenController extends Controller
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
        $divisi = divisi::all();
        return view('Tupoksi.Departemen.index', compact ('users', 'tupoksiDepartemen', 'divisi'));
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
        return view('Tupoksi.Departemen.index', compact ('users', 'tupoksiDepartemen'));
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
            'departemen' => 'required',
        ]);

        $tupoksiDepartemen = new TupoksiDepartemen;
        $tupoksiDepartemen->departemen = $request->get('departemen');
        $tupoksiDepartemen->created_by = $request->get('created_by');
        $tupoksiDepartemen->save();
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
        return view('Tupoksi.Departemen.index', compact ('users', 'tupoksiDepartemen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_departemen)
    {
        $tupoksiDepartemen=TupoksiDepartemen::where('id_departemen', $id_departemen)->first();
        $tupoksiDepartemen->departemen = $request->get('departemen');
        $tupoksiDepartemen->save();
        return redirect()->route('KPI_TupoksiDepartemen.edit', $id_departemen)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_departemen)
    {
        $tupoksiDepartemen = TupoksiDepartemen::where('id_departemen', $id_departemen);
        $tupoksiDepartemen->delete();
        return redirect()->route('KPI_TupoksiDepartemen.index')
            ->with('Sukses, data berhasil dihapus');
    }
}
