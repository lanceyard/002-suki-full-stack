<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB; 
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function authenticating(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('username', $credentials['username'])->first();
        if($user){
            $userLogin = $user->role_id;
        } else{
            $userLogin = 3;
        }
        
        if($userLogin == 1){
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                Session::flash('status','success');
                Session::flash('message', 'Selamat anda berhasil login sebagai admin!');

                return redirect()->intended('/dashboard');
            }
            Session::flash('status','failed');
            Session::flash('message', 'Login gagal!');
    
            return back();
        } elseif($userLogin == 2){
            Session::flash('status','failed');
            Session::flash('message', 'Maaf hanya admin yang boleh masuk!');
    
            return back();
        } elseif($userLogin ==3){
            Session::flash('status','failed');
            Session::flash('message', 'Login gagal!');
    
            return back();
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
