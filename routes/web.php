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
    Route::get('/isidatapengantin/{id}', 'client\PengantinController@formData')->name('isi-data-pengantin');
    Route::post('/isidatapengantin/{id}', 'client\PengantinController@inputDataPengantinPria')->name('input-data-pria');

    Route::get('/formdatawanita/{id}', 'client\PengantinController@formDataWanita')->name('form-data-pengantin-wanita');
    Route::post('/isidatapengantinpria/{id}', 'client\PengantinController@inputDataPengantinWanita')->name('input-data-pengantin-wanita');
});

