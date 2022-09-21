<?php

namespace App\Http\Controllers;
use App\Models\Divisi;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $users = auth()->user();
        $divisi = Divisi::all();
        return view('profile', compact('users', 'divisi'));
       
    }
}
