<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Carbon\Carbon;
class ChartJsController extends Controller
{
    public function index()
    {
        $year = ['2015','2016','2017','2018','2019','2020'];

        $user = ['2015','2016','2017','2018','2019','2020'];

    	return view('Chart.index')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    }
}
    