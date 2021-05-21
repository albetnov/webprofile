<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageLogin extends Controller
{
    public function proses_login(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $akunlogin = $req->only('username', 'password');
        if (Auth::attempt($akunlogin)) {
            $user = Auth::user();
            if ($user->level === 'admin') {
                $req->session()->put('nama', $user->name);
                $req->session()->put('id', $user->id);
                $req->session()->put('level', $user->level);
                return redirect()->route('admdashboard');
            } elseif ($user->level === 'staff') {
                $req->session()->put('nama', $user->name);
                $req->session()->put('id', $user->id);
                $req->session()->put('level', $user->level);
                return redirect('staff/dashboard');
            }
        } else {
            $notif = [
                'alert' => 'error',
                'pesan' => 'Username/Password salah!'
            ];
            return redirect()->back()->with($notif);
        }
    }

    public function logout()
    {
        request()->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
