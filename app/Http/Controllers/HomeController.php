<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KpiKorporasi;
use Auth;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if (Auth::User()->status == 'administrator') {
            return view('Admin.index');
        } else {
            return view('user.index');
        }
    }
}