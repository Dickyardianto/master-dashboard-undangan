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

Route::group(['middleware' => 'CekLoginMiddleware'], function() {
    // AUTH
    Route::get('logout', 'auth\AuthController@logoutExec')->name('logout-exec');
    
    Route::get('/dashboard', 'DashboardController@index')->name('index');
    Route::get('/tambahdata', 'DashboardController@tambahData')->name('tambah-data');
    
    // CRUD DATA
    Route::post('/createdata', 'DashboardController@createData')->name('create-data');
    Route::delete('delete/{id}', 'DashboardController@deleteData')->name('delete-data');
    Route::get('edit/{id}', 'DashboardController@editData')->name('edit-data');
    Route::patch('edit/{id}/update', 'DashboardController@updateData')->name('update-data');
});

