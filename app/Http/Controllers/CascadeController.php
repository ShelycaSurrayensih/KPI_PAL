<?php

namespace App\Http\Controllers;

use App\Models\CascadeKat;
use App\Models\CascadeKpi;
use Illuminate\Http\Request;

class CascadeController extends Controller
{
    public function cascadeKpiIndex(Request $request)
    {
        $users = auth()->user();
        $casKat = CascadeKat::all();
        $casKpi = CascadeKpi::all();

        return view('Cascade.index_kpi', compact('users', 'casKat', 'casKpi'));
    }
}
