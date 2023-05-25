<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\MencariPekerjaController;
use App\Http\Controllers\TentangAplikasiController;
use App\Http\Controllers\ResetController;

Route::redirect('/', '/login'); // Mengarahkan ke halaman login jika mengakses akar situs

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Menampilkan halaman login

Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Menangani permintaan login melalui metode POST

Route::get('/register', [PendaftaranController::class, 'showRegistrationForm'])->name('register'); // Menampilkan halaman pendaftaran

Route::post('/register', [PendaftaranController::class, 'register'])->name('register.post'); // Menangani permintaan pendaftaran melalui metode POST

Route::middleware(['auth'])->group(function () {
    Route::get('cariPRT', [FilterController::class, 'filterPRT'])->name('cariPRT'); // Menghandle permintaan pencarian PRT
    Route::get('/filter', [FilterController::class, 'filter'])->name('filter');
    Route::get('/daftarpekerja', [KontrakController::class, 'showDaftarPekerja'])->name('daftarpekerja');
    Route::get('/detailpekerja/{id}', [KontrakController::class, 'showDetailPekerja'])->name('detailpekerja');
    Route::post('/kontrak/batalkan/{id}', [KontrakController::class, 'batalkanKontrak'])->name('batalkan.kontrak');
    Route::post('/kontrak/batalkan/{id}', 'KontrakController@batalkanKontrak')->name('kontrak.batalkan');
    Route::get('/pembayaran', [MencariPekerjaController::class, 'showPesanan'])->name('pembayaran'); // Menampilkan halaman pembayaran
    Route::get('/bantuan', [BantuanController::class, 'showBantuan'])->name('bantuan'); // Menampilkan halaman bantuan
    Route::get('/tentangaplikasi', [TentangAplikasiController::class, 'showTentangAplikasi'])->name('tentangaplikasi'); // Menampilkan halaman tentang aplikasi
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard'); // Menampilkan halaman dashboard setelah login

});

Auth::routes(); // Menambahkan rute otorisasi bawaan Laravel

Route::get('/reset', [ResetController::class, 'showReset'])->name('reset.show'); // Menampilkan halaman reset password
Route::post('/reset-password', [ResetController::class, 'resetPassword'])->name('reset.password'); // Menangani permintaan reset password melalui metode POST
Route::get('/input-new-password/{token}', [ResetController::class, 'showInputNewPassword'])->name('input.newpassword'); // Menampilkan halaman input password baru
Route::post('/update-password', [ResetController::class, 'updatePassword'])->name('update.password'); // Menangani permintaan update password melalui metode POST

Route::fallback(function () {
    return redirect('/dashboard'); // Mengarahkan ke halaman dashboard jika rute tidak ditemukan
});






//get untuk mengeksekusi method showLoginForm pada AuthController sehingga mendapatkan data atau menampilkan halaman
//post untuk mengirimkan data ke server untuk diproses, misalnya ketika pengguna mengisi formulir.
