<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('authentikasi.login');
    }

    public function loginExec(Request $request) {
        // $data = User::where('email', $request->email)->firstOrFail();

        // $datas = DB::table('users')->where('email', $request->email)->first();
        // if($datas != NULL) {
        //     if(Hash::check($request->password, $datas->password)) {
        //         session(['berhasil_login' => true]);
        //         return redirect('/dashboard');
        //     }else {
        //         return redirect('/')->with('message', 'Email atau Password salah');
        //     }
        // }else {
        //     return redirect('/')->with('message', 'Email atau Password salah');
        // }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        }else {
            return redirect('/')->with('message', 'Email atau Password salah');
        }
    }

    public function logoutExec(Request $request) {
        // $request->session()->flush();
        
        Auth::logout();
        return redirect('/');
    }
}
