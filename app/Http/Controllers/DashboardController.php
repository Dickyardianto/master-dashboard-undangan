<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private function __validate(Request $data) {
        $validation = $data->validate(
            [
                'nama_client' => 'required|max:100|min:5'
            ],
            [
                'nama_client.required' => 'Nama Client harus diisi!',
                'nama_client.max' => 'Maximal 100 karakter!',
                'nama_client.min' => 'Minimal 5 karakter!'
            ]
        );
    }

    public function index() {
        $data = DB::table('tema')
        ->paginate(10);
        return view('index', ['data_client' => $data]);
    }

    public function tambahData() {
        return view('clients.tambahData');
    }

    public function createData(Request $data) {
        $this->__validate($data);
        DB::table('tema')->insert(
            [
             'nama_client' => $data->nama_client,
             'status' => 1            
            ]
        );

        return redirect()->route('index')->with('message', 'Data Berhasil Disimpan');
    }

    public function deleteData($id) {
        DB::table('tema')->where('id', $id)->delete();
        return redirect()->route('index');
    }

    public function editData($id) {
        $data = DB::table('tema')->where('id', $id)->first();
        return view('clients.editData', ['data_client' => $data]);
    }

    public function updateData(Request $data) {
        DB::table('tema')->where('id', $data->id)->update(
            [
                'nama_client' => $data->nama_client,
                'status' => $data->status
            ]);
        return redirect()->route('index')->with('message', 'Data Berhasil Di Ubah');
    }
}
