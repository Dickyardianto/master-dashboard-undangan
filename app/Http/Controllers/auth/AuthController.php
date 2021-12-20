<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('authentikasi.login');
    }

    public function loginExec(Request $request) {
        $data = User::where('email', $request->email)->firstOrFail();
        var_dump($data);
        if($data) {
            if(Hash::check($request->password, $data->password)) {
                session(['berhasil_login' => true]);
                return redirect('/dashboard');
            }else {
                return redirect('/')->with('message', 'Email atau Password salah');
            }
        }
    }

    public function logoutExec(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}
