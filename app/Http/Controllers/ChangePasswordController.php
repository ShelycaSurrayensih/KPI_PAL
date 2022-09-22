<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ChangePasswordController extends Controller
{
    public function CPassword(){
        return view('auth.passwords.change_password');
    }
    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success', 'Password Berhasil Di Update');

        }else{
            return redirect()->back()->with('error', 'Current Password tidak valid');
        }
    }
    
}
