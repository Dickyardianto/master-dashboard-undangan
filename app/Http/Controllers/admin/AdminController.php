<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view('admin.admin');
    }

    public function update(Request $data) {
        DB::table('users')->where('id', $data->id)->update(
            [
                'name' => $data->name,
                'email' => $data->email,
                'password' => bcrypt($data->password)
            ]);
        return redirect()->route('profil-admin')->with('message', 'Data Berhasil Di Ubah');
    }
}
