<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengantinController extends Controller
{
    // private function __validate(Request $data) {
    //     $data->validate(
    //         [
    //             'nama_pengantin_pria' => 'bail|required|max:100|min:5',
    //             'file_foto_utama' => 'bail|required|mimes:jpeg,bmp,png',
    //             'nama_pengantin_wanita' => 'bail|required|max:100|min:5',
    //         ],
    //         [
    //             'nama_pengantin_pria.required' => 'Nama pengantin pria harus diisi!',
    //             'nama_pengantin_wanita.required' => 'Nama pengantin wanita harus diisi!',
    //             'file_foto_utama.required' => 'Foto utama harus diisi!',
    //             'file_foto_utama.mimes' => 'Ekstensi file harus berupa jpeg, bmp, atau png!'
    //         ]
    //     );
    // }

    public function formData(Request $request) {
        $id = $request->id;
        $data_pengantin_pria = DB::table('pengantin_pria')
        ->first();
        return view('clients.isiDataPengantin', ['id_client' => $id, 'data_pengantin_pria' => $data_pengantin_pria]);
    }

    public function inputDataPengantinPria(Request $request, $id)
    {
        $request->validate(
            [
                'nama_pengantin_pria' => 'bail|required|max:100|min:5',
                'file_foto_utama' => 'bail|required|mimes:jpeg,bmp,png',
            ],
            [
                'nama_pengantin_pria.required' => 'Nama pengantin pria harus diisi!',
                'file_foto_utama.required' => 'Foto utama harus diisi!',
                'file_foto_utama.mimes' => 'Ekstensi file harus berupa jpeg, bmp, atau png!'
            ]
        );

        $nf = $request->file_foto_utama;
        $namaFile = $nf->getClientOriginalName();

        DB::table('pengantin_pria')->insert(
            [
             'nama_pengantin_pria' => $request->nama_pengantin_pria,
             'id_client' => $id,            
             'foto_utama' => time(). '-' .$namaFile            
            ]
        );
  
        $nf->move(public_path().'/uploads', time(). '-' .$namaFile);
   
        return back()->with('message', 'Data Berhasil Disimpan');
    }

    public function inputDataPengantinWanita(Request $request, $id)
    {
        $request->validate(
            [
                'nama_pengantin_wanita' => 'bail|required|max:100|min:5',
                'file_foto_utama' => 'bail|required|mimes:jpeg,bmp,png',
            ],
            [
                'nama_pengantin_wanita.required' => 'Nama pengantin wanita harus diisi!',
                'file_foto_utama.required' => 'Foto utama harus diisi!',
                'file_foto_utama.mimes' => 'Ekstensi file harus berupa jpeg, bmp, atau png!'
            ]
        );

        $nf = $request->file_foto_utama;
        $namaFile = $nf->getClientOriginalName();

        DB::table('pengantin_wanita')->insert(
            [
             'nama_pengantin_wanita' => $request->nama_pengantin_wanita,
             'id_client' => $id,            
             'foto_utama' => time(). '-' .$namaFile            
            ]
        );
  
        $nf->move(public_path().'/uploads', time(). '-' .$namaFile);
   
        return back()->with('message', 'Data Berhasil Disimpan');
   
    }

    public function formDataWanita(Request $request) {
        $id = $request->id;
        $data_pengantin_wanita = DB::table('pengantin_wanita')
        ->first();
        return view('clients.isiDataPengantinWanita', ['id_client' => $id, 'data_pengantin_wanita' => $data_pengantin_wanita]);
    }

    public function formAlamat(Request $request) {
        $id = $request->id;
        $alamat_nikah = DB::table('alamat_nikah_master_2')
        ->first();
        return view('clients.alamatNikahPengantin', ['id_client' => $id, 'alamat_nikah' => $alamat_nikah]);
    }

    public function inputAlamatNikah(Request $data, $id) {
        $data->validate(
            [
                'alamat_nikah' => 'required|max:150|min:5',
                'tanggal_nikah' => 'required'
            ],
            [
                'alamat_nikah.required' => 'Alamat nikah harus diisi!',
                'alamat_nikah.max' => 'Maksimal 150 karakter!',
                'alamat_nikah.min' => 'Mohon lengkapi beserta alamat lengkap!',
                'tanggal_nikah.required' => 'Tanggal nikah harus diisi!',
            ]
        );

        DB::table('alamat_nikah_master_2')->insert(
            [
             'id_client' => $id,
             'alamat_nikah' => $data->alamat_nikah,
             'tanggal_nikah' => $data->tanggal_nikah            
            ]
        );

        return back()->with('message', 'Data Berhasil Disimpan');
    }
    
}
