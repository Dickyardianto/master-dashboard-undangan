<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// AUTH
Route::get('/', 'auth\AuthController@login')->name('login');
Route::post('login', 'auth\AuthController@loginExec')->name('login-exec');

// Route::group(['middleware' => 'CekLoginMiddleware'], function() {
Route::group(['middleware' => 'auth'], function() {
    // AUTH
    Route::get('logout', 'auth\AuthController@logoutExec')->name('logout-exec');
    
    Route::get('/dashboard', 'DashboardController@index')->name('index');
    Route::get('/tambahdata', 'DashboardController@tambahData')->name('tambah-data');
    
    // CRUD DATA
    Route::post('/createdata', 'DashboardController@createData')->name('create-data');
    Route::delete('delete/{id}', 'DashboardController@deleteData')->name('delete-data');
    Route::get('edit/{id}', 'DashboardController@editData')->name('edit-data');
    Route::patch('edit/{id}/updateCrud', 'DashboardController@updateData')->name('update-data');
    
    // Profil Admin
    Route::get('/profiladmin', 'admin\AdminController@index')->name('profil-admin');
    Route::patch('edit/{id}/update', 'admin\AdminController@update')->name('update-admin');

    // Isi Data Client
        // Nama Pengantin Pria
    Route::get('/isidatapengantin/{id}', 'client\PengantinController@formData')->name('isi-data-pengantin');
    Route::post('/isidatapengantin/{id}', 'client\PengantinController@inputDataPengantinPria')->name('input-data-pria');
        // Nama Pengantin Wanita
    Route::get('/formdatawanita/{id}', 'client\PengantinController@formDataWanita')->name('form-data-pengantin-wanita');
    Route::post('/isidatapengantinpria/{id}', 'client\PengantinController@inputDataPengantinWanita')->name('input-data-pengantin-wanita');
        // Alamat Pengantin
    Route::get('/formalamatnikah/{id}', 'client\PengantinController@formAlamat')->name('alamat-pengantin');
    Route::post('/inputalamatnikah/{id}', 'client\PengantinController@inputAlamatNikah')->name('input-alamat-nikah');
        // Resepsi
    Route::get('/formresepsi/{id}', 'client\PengantinController@formResepsi')->name('form-resepsi');
    Route::post('/inputresepsi/{id}', 'client\PengantinController@inputResepsi')->name('input-resepsi');
        // Besan Pria
    Route::get('/formbesanpria/{id}', 'client\PengantinController@formBesanPria')->name('form-besan-pria');
    Route::post('/inputbesanpria/{id}', 'client\PengantinController@inputBesanPria')->name('input-besan-pria');
        // Besan Wanita
    Route::get('/formbesanwanita/{id}', 'client\PengantinController@formBesanWanita')->name('form-besan-wanita');
    Route::post('/inputbesanwanita/{id}', 'client\PengantinController@inputBesanWanita')->name('input-besan-wanita');
        // Besan Wanita
    Route::get('/formakad/{id}', 'client\PengantinController@formAkad')->name('form-akad');
    Route::post('/inputakad/{id}', 'client\PengantinController@inputAkad')->name('input-akad');
        // Sosial Media Pria
    Route::get('/formsosialmedia/{id}', 'client\PengantinController@formSosialMedia')->name('form-sosial-media');
    Route::post('/inputsosialmedia/{id}', 'client\PengantinController@inputSosialMedia')->name('input-sosial-media');
        // Sosial Media Wanita
    Route::get('/formsosialmediawanita/{id}', 'client\PengantinController@formSosialMediaWanita')->name('form-sosial-media-wanita');
    Route::post('/inputsosialmediawanita/{id}', 'client\PengantinController@inputSosialMediaWanita')->name('input-sosial-media-wanita');
        // Pendukung Master
    Route::get('/formpendukung/{id}', 'client\PengantinController@formPendukung')->name('form-pendukung');
    Route::post('/inputpendukung/{id}', 'client\PengantinController@inputPendukung')->name('input-pendukung');
});

