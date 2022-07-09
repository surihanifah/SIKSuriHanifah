<?php

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

Route::get('/', function () {
    return view('/layouts/mainlayout');
});


Route::get('/pasien','PasienController@index')->name('pasien-index');
    Route::post('/pasien/create','PasienController@create')->name('create-pasien');
    Route::get('/pasien/edit/{id_pasien}','PasienController@edit');
    Route::post('/pasien/update','PasienController@update')->name('update-pasien');
    Route::get('/pasien/hapus/{id_pasien}','PasienController@hapus');

Route::get('/dokter','DokterController@index')->name('dokter-index');
    Route::post('/dokter/create','DokterController@create')->name('create-dokter');
    Route::get('/dokter/edit/{id_dokter}','DokterController@edit');
    Route::post('/dokter/update','DokterController@update')->name('update-dokter');
    Route::get('/dokter/hapus/{id_dokter}','DokterController@hapus');

Route::get('/obat','ObatController@index')->name('obat-index');
    Route::post('/obat/create','ObatController@create')->name('create-obat');
    Route::get('/obat/edit/{id_obat}','ObatController@edit');
    Route::post('/obat/update','ObatController@update')->name('update-obat');
    Route::get('/obat/hapus/{id_obat}','ObatController@hapus');


    Route::get('/login','LoginController@index')->name('login-index');
