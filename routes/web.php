
<?php

// menentukan rute atau URL yang akan digunakan.

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontrakController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

//get untuk mengeksekusi method showLoginForm pada AuthController sehingga mendapatkan data atau menampilkan halaman
//post untuk mengirimkan data ke server untuk diproses, misalnya ketika pengguna mengisi formulir.

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/daftarpekerja', [KontrakController::class, 'index'])->name('daftarpekerja');
Route::get('/bantuan', [BantuanController::class, 'index'])->name('bantuan');
