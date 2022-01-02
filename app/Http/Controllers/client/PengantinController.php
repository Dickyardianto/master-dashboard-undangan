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

    public function formResepsi(Request $request) {
        $id = $request->id;
        $resepsi = DB::table('resepsi_master')
        ->first();
        return view('clients.formResepsi', ['id_client' => $id, 'resepsi' => $resepsi]);
    }

    public function inputResepsi(Request $data, $id) {
        $data->validate(
            [
                'tanggal_resepsi' => 'required',
                'pukul_resepsi' => 'required',
                'lokasi_resepsi' => 'required|max:150|min:5'
            ],
            [
                'tanggal_resepsi.required' => 'Tanggal resepsi harus diisi!',
                'pukul_resepsi.required' => 'Pukul resepsi harus diisi!',
                'lokasi_resepsi.required' => 'Lokasi resepsi harus diisi!',
                'lokasi_resepsi.max' => 'Batas karakter hanya 150!',
                'lokasi_resepsi.min' => 'Mohon lengkapi beserta alamat lengkap!'
            ]
        );

        DB::table('resepsi_master')->insert(
            [
             'id_client' => $id,
             'tanggal_resepsi' => $data->tanggal_resepsi,
             'pukul' => $data->pukul_resepsi,            
             'lokasi_resepsi' => $data->lokasi_resepsi            
            ]
        );

        return back()->with('message', 'Data Berhasil Disimpan');
    }

    public function formBesanPria(Request $request) {
        $id = $request->id;
        $besan_pria = DB::table('besan_pria')
        ->first();
        return view('clients.formBesanPria', ['id_client' => $id, 'besan_pria' => $besan_pria]);
    }

    public function inputBesanPria(Request $data, $id) {
        $data->validate(
            [
                'nama_ayah' => 'required|max:150|min:5',
                'nama_ibu' => 'required|max:150|min:5'
            ],
            [
                'nama_ayah.required' => 'Nama ayah harus diisi!',
                'nama_ayah.max' => 'Batas karakter hanya 150!',
                'nama_ayah.min' => 'Min karakter 5!',
                'nama_ibu.required' => 'Nama ibu harus diisi!',
                'nama_ibu.max' => 'Batas karakter hanya 150!',
                'nama_ibu.min' => 'Min karakter 5!'
            ]
        );

        DB::table('besan_pria')->insert(
            [
             'id_client' => $id,
             'nama_ayah' => $data->nama_ayah,
             'nama_ibu' => $data->nama_ibu          
            ]
        );

        return back()->with('message', 'Data Berhasil Disimpan');
    }

    public function formBesanWanita(Request $request) {
        $id = $request->id;
        $besan_wanita = DB::table('besan_wanita')
        ->first();
        return view('clients.formBesanWanita', ['id_client' => $id, 'besan_wanita' => $besan_wanita]);
    }

    public function inputBesanWanita(Request $data, $id) {
        $data->validate(
            [
                'nama_ayah' => 'required|max:150|min:5',
                'nama_ibu' => 'required|max:150|min:5'
            ],
            [
                'nama_ayah.required' => 'Nama ayah harus diisi!',
                'nama_ayah.max' => 'Batas karakter hanya 150!',
                'nama_ayah.min' => 'Min karakter 5!',
                'nama_ibu.required' => 'Nama ibu harus diisi!',
                'nama_ibu.max' => 'Batas karakter hanya 150!',
                'nama_ibu.min' => 'Min karakter 5!'
            ]
        );

        DB::table('besan_wanita')->insert(
            [
             'id_client' => $id,
             'nama_ayah' => $data->nama_ayah,
             'nama_ibu' => $data->nama_ibu          
            ]
        );

        return back()->with('message', 'Data Berhasil Disimpan');
    }

    public function formAkad(Request $request) {
        $id = $request->id;
        $akad_master = DB::table('akad_master')
        ->first();
        return view('clients.formAkadMaster', ['id_client' => $id, 'akad_master' => $akad_master]);
    }

    public function inputAkad(Request $data, $id) {
        $data->validate(
            [
                'tanggal_akad' => 'required',
                'pukul_akad' => 'required',
                'lokasi_akad' => 'required|max:150|min:5'
            ],
            [
                'tanggal_akad.required' => 'Tanggal akad harus diisi!',
                'pukul_akad.required' => 'Pukul akad harus diisi!',
                'lokasi_akad.required' => 'Lokasi akad harus diisi!',
                'lokasi_akad.max' => 'Batas karakter hanya 150!',
                'lokasi_akad.min' => 'Mohon lengkapi beserta alamat lengkap!'
            ]
        );

        DB::table('akad_master')->insert(
            [
             'id_client' => $id,
             'tanggal_akad' => $data->tanggal_akad,
             'pukul' => $data->pukul_akad,            
             'lokasi_akad' => $data->lokasi_akad            
            ]
        );

        return back()->with('message', 'Data Berhasil Disimpan');
    }

    public function formSosialMedia(Request $request) {
        $id = $request->id;
        $sosial_media_pria = DB::table('sosial_media_pria')
        ->first();
        return view('clients.formSosialMediaMaster', ['id_client' => $id, 'sosial_media_pria' => $sosial_media_pria]);
    }

    public function inputSosialMedia(Request $data, $id) {
        DB::table('sosial_media_pria')->insert(
            [
             'id_client' => $id,
             'instagram' => $data->instagram,
             'twitter' => $data->twitter,            
             'facebook' => $data->facebook       
            ]
        );

        return back()->with('message', 'Data Berhasil Disimpan');
    }

    public function formSosialMediaWanita(Request $request) {
        $id = $request->id;
        $sosial_media_wanita = DB::table('sosial_media_wanita')
        ->first();
        return view('clients.formSosialMediaWanitaMaster', ['id_client' => $id, 'sosial_media_wanita' => $sosial_media_wanita]);
    }

    public function inputSosialMediaWanita(Request $data, $id) {
        DB::table('sosial_media_wanita')->insert(
            [
             'id_client' => $id,
             'instagram' => $data->instagram,
             'twitter' => $data->twitter,            
             'facebook' => $data->facebook       
            ]
        );

        return back()->with('message', 'Data Berhasil Disimpan');
    }

    public function formPendukung(Request $request) {
        $id = $request->id;
        $pendukung_master = DB::table('pendukung_master')
        ->first();
        return view('clients.formPendukungMaster', ['id_client' => $id, 'pendukung_master' => $pendukung_master]);
    }

    public function inputPendukung(Request $request, $id)
    {
        $request->validate(
            [
                'musik' => 'required|mimes:mp3',
                'ayat_quotes' => 'required|max:250|min:5',
                'maps' => 'required|max:200|min:5',
                'quotes' => 'required|max:250|min:5'
            ],
            [
                'musik.required' => 'Musik harus diisi!',
                'ayat_quotes.required' => 'Setidaknya memiliki Quotes (ayat)!',
                'ayat_quotes.max' => 'Maksimal 250 karakter!',
                'ayat_quotes.min' => 'Minimal 5 karakter!',
                'maps.required' => 'Setidaknya memiliki alamat berupa maps!',
                'quotes.required' => 'Setidaknya memiliki Quotes',
                'quotes.max' => 'Maksimal 250 karakter!',
                'quotes.min' => 'Minimal 5 karakter!'
            ]
        );

        $nf = $request->musik;
        $namaFile = $nf->getClientOriginalName();

        DB::table('pendukung_master')->insert(
            [
             'id_client' => $id,            
             'musik' => time(). '-' .$namaFile,
             'ayat_quotes' => $request->ayat_quotes,       
             'maps' => $request->maps,       
             'quotes_akhir' => $request->quotes       
            ]
        );
  
        $nf->move(public_path().'/uploads/musik', time(). '-' .$namaFile);
   
        return back()->with('message', 'Data Berhasil Disimpan');
    }

    public function formFotoGallery(Request $request) {
        $id = $request->id;
        $foto_gallery = DB::table('foto_gallery_master')
        ->first();
        return view('clients.formFotoGallery', ['id_client' => $id, 'foto_gallery' => $foto_gallery]);
    }

    public function form6FotoGallery(Request $request) {
        $id = $request->id;
        $foto_gallery = DB::table('foto_gallery_master')
        ->first();
        return view('clients.form6FotoGallery', ['id_client' => $id, 'foto_gallery' => $foto_gallery]);
    }

    public function input6FotoGallery(Request $request, $id)
    {
        $request->validate(
            [
                'foto1' => 'required|mimes:jpeg,bmp,png',
                'foto2' => 'required|mimes:jpeg,bmp,png',
                'foto3' => 'required|mimes:jpeg,bmp,png',
                'foto4' => 'required|mimes:jpeg,bmp,png',
                'foto5' => 'required|mimes:jpeg,bmp,png',
                'foto6' => 'required|mimes:jpeg,bmp,png'
            ],
            [
                'foto1.required' => 'Foto harus diisi!',
                'foto2.required' => 'Foto harus diisi!',
                'foto3.required' => 'Foto harus diisi!',
                'foto4.required' => 'Foto harus diisi!',
                'foto5.required' => 'Foto harus diisi!',
                'foto6.required' => 'Foto harus diisi!'
            ]
        );

        $foto_1 = $request->foto1;
        $foto_2 = $request->foto2;
        $foto_3 = $request->foto3;
        $foto_4 = $request->foto4;
        $foto_5 = $request->foto5;
        $foto_6 = $request->foto6;

        $namaFileFoto1 = $foto_1->getClientOriginalName();
        $namaFileFoto2 = $foto_2->getClientOriginalName();
        $namaFileFoto3 = $foto_3->getClientOriginalName();
        $namaFileFoto4 = $foto_4->getClientOriginalName();
        $namaFileFoto5 = $foto_5->getClientOriginalName();
        $namaFileFoto6 = $foto_6->getClientOriginalName();

        DB::table('foto_gallery_master')->insert(
            [
             'id_client' => $id,            
             'foto_gallery_1' => time(). '-' .$namaFileFoto1,            
             'foto_gallery_2' => time(). '-' .$namaFileFoto2,            
             'foto_gallery_3' => time(). '-' .$namaFileFoto3,            
             'foto_gallery_4' => time(). '-' .$namaFileFoto4,            
             'foto_gallery_5' => time(). '-' .$namaFileFoto5,            
             'foto_gallery_6' => time(). '-' .$namaFileFoto6         
            ]
        );
  
        $foto_1->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto1);
        $foto_2->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto2);
        $foto_3->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto3);
        $foto_4->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto4);
        $foto_5->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto5);
        $foto_6->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto6);
   
        return back()->with('message', 'Data Berhasil Disimpan');
   
    }

    public function form12FotoGallery(Request $request) {
        $id = $request->id;
        $foto_gallery = DB::table('foto_gallery_master')
        ->first();
        return view('clients.form12FotoGallery', ['id_client' => $id, 'foto_gallery' => $foto_gallery]);
    }

    public function input12FotoGallery(Request $request, $id)
    {
        $request->validate(
            [
                'foto1' => 'required|mimes:jpeg,bmp,png',
                'foto2' => 'required|mimes:jpeg,bmp,png',
                'foto3' => 'required|mimes:jpeg,bmp,png',
                'foto4' => 'required|mimes:jpeg,bmp,png',
                'foto5' => 'required|mimes:jpeg,bmp,png',
                'foto6' => 'required|mimes:jpeg,bmp,png',
                'foto7' => 'required|mimes:jpeg,bmp,png',
                'foto8' => 'required|mimes:jpeg,bmp,png',
                'foto9' => 'required|mimes:jpeg,bmp,png',
                'foto10' => 'required|mimes:jpeg,bmp,png',
                'foto11' => 'required|mimes:jpeg,bmp,png',
                'foto12' => 'required|mimes:jpeg,bmp,png'
            ]
        );

        $foto_1 = $request->foto1;
        $foto_2 = $request->foto2;
        $foto_3 = $request->foto3;
        $foto_4 = $request->foto4;
        $foto_5 = $request->foto5;
        $foto_6 = $request->foto6;
        $foto_7 = $request->foto7;
        $foto_8 = $request->foto8;
        $foto_9 = $request->foto9;
        $foto_10 = $request->foto10;
        $foto_11 = $request->foto11;
        $foto_12 = $request->foto12;

        $namaFileFoto1 = $foto_1->getClientOriginalName();
        $namaFileFoto2 = $foto_2->getClientOriginalName();
        $namaFileFoto3 = $foto_3->getClientOriginalName();
        $namaFileFoto4 = $foto_4->getClientOriginalName();
        $namaFileFoto5 = $foto_5->getClientOriginalName();
        $namaFileFoto6 = $foto_6->getClientOriginalName();
        $namaFileFoto7 = $foto_7->getClientOriginalName();
        $namaFileFoto8 = $foto_8->getClientOriginalName();
        $namaFileFoto9 = $foto_9->getClientOriginalName();
        $namaFileFoto10 = $foto_10->getClientOriginalName();
        $namaFileFoto11 = $foto_11->getClientOriginalName();
        $namaFileFoto12 = $foto_12->getClientOriginalName();

        DB::table('foto_gallery_master')->insert(
            [
             'id_client' => $id,            
             'foto_gallery_1' => time(). '-' .$namaFileFoto1,            
             'foto_gallery_2' => time(). '-' .$namaFileFoto2,            
             'foto_gallery_3' => time(). '-' .$namaFileFoto3,            
             'foto_gallery_4' => time(). '-' .$namaFileFoto4,            
             'foto_gallery_5' => time(). '-' .$namaFileFoto5,            
             'foto_gallery_6' => time(). '-' .$namaFileFoto6,         
             'foto_gallery_7' => time(). '-' .$namaFileFoto7,         
             'foto_gallery_8' => time(). '-' .$namaFileFoto8,         
             'foto_gallery_9' => time(). '-' .$namaFileFoto9,         
             'foto_gallery_10' => time(). '-' .$namaFileFoto10,         
             'foto_gallery_11' => time(). '-' .$namaFileFoto11,         
             'foto_gallery_12' => time(). '-' .$namaFileFoto12         
            ]
        );
  
        $foto_1->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto1);
        $foto_2->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto2);
        $foto_3->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto3);
        $foto_4->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto4);
        $foto_5->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto5);
        $foto_6->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto6);
        $foto_7->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto7);
        $foto_8->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto8);
        $foto_9->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto9);
        $foto_10->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto10);
        $foto_11->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto11);
        $foto_12->move(public_path().'/uploads/foto-gallery', time(). '-' .$namaFileFoto12);
   
        return back()->with('message', 'Data Berhasil Disimpan');
   
    }
    
    
}
