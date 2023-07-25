<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObservasiAwalController;
use App\Http\Controllers\ObservasiLanjutController;
use App\Http\Controllers\RekamMedisController;


Route::get('/', [LoginController::class,'index'])->name('/');
Route::post('dashboard', [LoginController::class,'login_proses']);

//cek level : dokterumum', 'doktergigi', 'bidan', 'perawat', 'admin', 'superadmin

Route::middleware(['auth:','ceklevel:superadmin,admin,perawat,dokterumum,doktergigi,bidan'])->group(function () {

    Route::get('/logout',[LoginController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class,'index']);

});

Route::middleware(['auth:','ceklevel:superadmin,admin,perawat,dokterumum,doktergigi,bidan'])->group(function () {

    //Routing Rekam Medis Pasien
    Route::get('rekammedis', [RekamMedisController::class,'view_RekamMedis']);
    Route::get('tambahdatarekammedis/{id}', [RekamMedisController::class,'tambah_RekamMedis']);
    Route::post('tambahdatarekammedis/{id}', [RekamMedisController::class,'tambah_RekamMedis_Proses']);
    
    Route::get('lihatdatarekammedis/{id}',[RekamMedisController::class,'lihatrekmed']);
    Route::get('Rekmedobservasiawal/{id}', [RekamMedisController::class,'lihatdata_ObservasiAwal']);
    Route::get('Rekmedobservasilanjutan/{id}', [RekamMedisController::class,'lihatdata_Observasilanjutan']);
    Route::get('Riwayatrekammedis/{id}', [RekamMedisController::class,'lihatdata_riwayatrekammedis']);
    
    Route::get('hapusdatarekmed/{id}', [RekamMedisController::class,'delete_Rekam_Medis']);
    
    
});

Route::middleware(['auth:','ceklevel:superadmin,admin'])->group(function () {

    //Routing Bagian Pegawai
    Route::get('dataPegawai', [PegawaiController::class,'view_DataPegawai']);
    Route::get('tambahdatapegawai', [PegawaiController::class,'add_DataPegawai']);
    Route::post('tambahdatapegawai', [PegawaiController::class,'add_DataPegawai_proses']);
    Route::get('editdatapegawai/{id}',[PegawaiController::class,'editdatapegawai']);
    Route::post('editdatapegawai/{id}',[PegawaiController::class,'edit_prosesdatapegawai']);
    Route::get('hapusdatapegawai/{id}',[PegawaiController::class,'deletedatapegawai']);
    Route::get('lihatdatapegawai/{id}',[PegawaiController::class,'lihatdatapegawai']);

});

Route::middleware(['auth:','ceklevel:superadmin,admin,perawat'])->group(function () {

    //Routing Bagian Pasien
    Route::get('dataPasien', [PasienController::class,'view_DataPasien']);
    Route::post('dataPasien', [PasienController::class,'cari_DataPasien']);
    Route::get('tambahdatapasien', [PasienController::class,'add_DataPasien']);
    Route::post('tambahdatapasien', [PasienController::class,'add_DataPasien_proses']);
    Route::get('editdatapasien/{id}',[PasienController::class,'editdatapasien']);
    Route::post('editdatapasien/{id}',[PasienController::class,'edit_prosesdatapasien']);
    Route::get('hapusdatapasien/{id}',[PasienController::class,'deletedatapasien']);

    //Routing Bagian Observasi Awal
    Route::get('addobservasiawal/{id}', [ObservasiAwalController::class,'add_ObservasiAwal']);
    Route::post('addobservasiawal/{id}', [ObservasiAwalController::class,'add_ProsesObservasiAwal']);
    Route::get('hapusobservasiawal/{id}', [ObservasiAwalController::class,'delete_ObservasiAwal']);

});

Route::middleware(['auth:','ceklevel:superadmin,admin,perawat,dokterumum,doktergigi,bidan'])->group(function () {

    //Routing Bagian Observasi Awal
    Route::get('observasiawal', [ObservasiAwalController::class,'view_ObservasiAwal']);
    Route::post('observasiawal', [ObservasiAwalController::class,'cari_ObservasiAwal']);
    Route::get('lihatdataobservasiawal/{id}', [ObservasiAwalController::class,'lihatdata_ObservasiAwal']);

});

Route::middleware(['auth:','ceklevel:superadmin,admin,dokterumum,doktergigi,bidan'])->group(function () {
  
    //Routing Bagian Observasi Lanjutan
    Route::get('observasilanjutan', [ObservasiLanjutController::class,'view_ObservasiLanjutan']);
    Route::post('observasilanjutan', [ObservasiLanjutController::class,'cari_ObservasiLanjutan']);
    Route::get('addobservasilanjutan/{id}', [ObservasiLanjutController::class,'add_ObservasiLanjutan']);
    Route::post('addobservasilanjutan/{id}', [ObservasiLanjutController::class,'add_ProsesObservasiLanjutan']);
    Route::get('lihatobservasilanjutan/{id}', [ObservasiLanjutController::class,'lihatdata_ObservasiLanjutan']);
    Route::get('hapusobservasilanjut/{id}', [ObservasiLanjutController::class,'delete_ObservasiLanjutan']);
   
});

// Route::middleware(['auth:','ceklevel:superadmin,admin,perawat,dokterumum,doktergigi,bidan'])->group(function () {
// });



