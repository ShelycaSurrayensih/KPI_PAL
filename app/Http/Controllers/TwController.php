<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TupoksiDepartemen;
use App\Models\TupoksiKPI;
use App\Models\TupoksiProker;
use App\Models\TupoksiTw;
use App\Models\TupoksiRealisasi;

use Illuminate\Support\Facades\Response;
use PDF;

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
        $tupoksiRealisasi = TupoksiRealisasi::all();
        return view('Tupoksi.Proker.Tw.index', compact ('users', 'tupoksiDepartemen', 'tupoksiKPI', 'tupoksiProker', 'tupoksiTw', 'twCount', 'tupoksiRealisasi'));
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
        $tupoksiRealisasi = TupoksiRealisasi::all();
        return view('Tupoksi.Proker.Tw.index', compact ('users', 'tupoksiDepartemen', 'tupoksiKPI', 'tupoksiProker', 'tupoksiTw', 'tupoksiRealisasi'));
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

        $tupoksiTW = $request->tw;
        $tupoksiIdTW = $request->id_proker;
        $tupoksiTW = TupoksiTw::where('id_proker', $tupoksiIdTW)->where('tw', $tupoksiTW)->first();

        $tupoksiRealisasi = new TupoksiRealisasi;
        $tupoksiRealisasi->id_tw = $tupoksiTW->id_tw;
        $tupoksiRealisasi->progres = 'Belum Terisi';
        $tupoksiRealisasi->deskripsi = 'Belum Terisi';
        $tupoksiRealisasi->save();
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
    public function update(Request $request, $id_tw)
    {
        // $tupoksiTw = TupoksiTw::where('id_tw', $id_tw)->first();
        // $tupoksiTw->id_proker = $request->get('id_proker');
        // $tupoksiTw->tw = $request->get('tw');
        // $tupoksiTw->deskripsi = $request->get('deskripsi');
        // $tupoksiTw->progres = $request->get('progres');
        // $tupoksiTw->save();
        $tupoksiTw = TupoksiTw::where('id_tw',$id_tw)->update($request->except(['_token']));
        return redirect()->back();
        

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

    public function view($file_name)
    {
        $file = $file_name;
        $path = public_path('File/Tupoksi/'. $file_name);
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::file($path);
        
    }

    //Download File
    public function download($file_name)
    {
        $file = $file_name;
        $path = public_path('File/RKAP/'. $file_name);
        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($path, $file, $headers);
        
    }
}
