<?php

use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KonsulController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanPasienController;
use App\Http\Middleware\DokterMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|php
*/




Route::get('/admin', [AuthController::class, 'index']);
Route::post('/savelogin', [AuthController::class, 'loginproses'])->name('savelogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// admin
Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard']);

    Route::get('/obats', [ObatController::class, 'obats']);
    Route::get('/obats/tambah', [ObatController::class, 'create']);
    Route::post('/obats/simpan', [ObatController::class, 'store']);
    Route::get('/obats/{id}/edit', [ObatController::class, 'edit']);
    Route::post('/obats/{id}/update', [ObatController::class, 'update']);
    Route::get('/obats/{id}/hapus', [ObatController::class, 'destroy']);
    Route::post('/persediaan/restock/{id}', [ObatController::class, 'restock'])->name('persediaan.restock');


    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::get('/karyawan/tambah', [KaryawanController::class, 'create']);
    Route::post('/karyawan/simpan', [KaryawanController::class, 'store']);
    Route::get('/karyawan/{id}/hapus', [KaryawanController::class, 'destroy']);
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
    Route::get('/karyawan/{id}/jam', [KaryawanController::class, 'jam']);
    Route::post('/karyawan/{id}/update', [KaryawanController::class, 'update']);
    Route::post('/karyawan/{id}/updatejam', [KaryawanController::class, 'updatejam']);


    Route::get('/dokters', [DokterController::class, 'dokters']);
    Route::get('/dokters/tambah', [DokterController::class, 'create']);
    Route::post('/dokters/simpan', [DokterController::class, 'store']);
    Route::get('/dokters/{id}/edit', [DokterController::class, 'edit']);
    Route::post('/dokters/{id}/update', [DokterController::class, 'update']);
    Route::get('/dokters/{id}/hapus', [DokterController::class, 'destroy']);




    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/tambah', [TransaksiController::class, 'create']);
    Route::post('/transaksi/simpan', [TransaksiController::class, 'store']);
    Route::get('/transaksi/{id}/hapus', [TransaksiController::class, 'destroy']);
    Route::get('/transaksi/export', function () {
        return Excel::download(new TransaksiExport, 'data_transaksi.xlsx');
    });

    // laporan obat
    Route::get('/laporanobat', [ObatController::class, 'laporan']);
    Route::get('/laporanobat/{id}/edit', [ObatController::class, 'laporanedit']);;
    // laporan pasien
    Route::get('/laporan', [LaporanPasienController::class, 'index']);
});
Route::get('/konsultasis', [KonsulController::class, 'konsultasis']);
Route::get('/konsultasis/tambah', [KonsulController::class, 'create']);
Route::post('/konsultasis/simpan', [KonsulController::class, 'store']);
Route::get('/konsultasis/{id}/edit', [KonsulController::class, 'edit']);
Route::get('/konsultasi/print/{id}', [KonsulController::class, 'download'])->name('konsultasi.print');
Route::post('/konsultasis/{id}/update', [KonsulController::class, 'update']);
Route::get('/konsultasis/{id}/hapus', [KonsulController::class, 'destroy']);
Route::get('/pasien/proses/{id}', [KonsulController::class, 'proses'])->name('pasien.proses');

// auth dokter
Route::get('/doctor', [DokterController::class, 'dokter_login']);
Route::middleware([DokterMiddleware::class])->group(function () {
    Route::get('/doctor/dashboard', [DokterController::class, 'dashboard']);
    Route::get('/doctor/resep', [DokterController::class, 'doctor']);
    Route::get('/doctor/laporan', [DokterController::class, 'laporanPasien']);;
    // Route::get('doctor/resep/{id}/proses', [DokterController::class, 'resep']);
    Route::post('/resep/{id}/proses', [DokterController::class, 'resep'])->name('resep.proses');
    Route::post('/resep/{id}/prosess', [DokterController::class, 'resep_noval'])->name('resep.prosess');
});

Route::get('/', [HomeController::class, 'awal']);

//auth user
Route::post('/login', [DokterController::class, 'loginproses'])->name('login');
// Route::post('/saveregis', [UserController::class, 'storeuser']);
// Route::get('register', [UserController::class, 'register']);
Route::post('/logoutDokter', [DokterController::class, 'logout'])->name('logoutDokter');

// user
Route::get('/home', [HomeController::class, 'index']);
Route::get('/pesan', [HomeController::class, 'pesan']);
Route::get('/dokter', [DokterController::class, 'index']);
Route::get('/obat', [ObatController::class, 'index']);
Route::get('/obat/checkout', [ObatController::class, 'co']);
Route::get('/konsultasi', [KonsulController::class, 'index']);
Route::post('/konsultasi/simpan', [KonsulController::class, 'store']);

// pembayaran
Route::get('/pembayaran/form/{id}', [TransaksiController::class, 'formPembayaran'])->name('pembayaran.form');
Route::post('/pembayaran/proses/{id}', [TransaksiController::class, 'prosesPembayaran'])->name('pembayaran.proses');

Route::get('/pembayaran', [TransaksiController::class, 'indexbayar']);
Route::post('/payment/status', [TransaksiController::class, 'status']);
Route::get('/checkout/{id}', [TransaksiController::class, 'createTransaction']);
