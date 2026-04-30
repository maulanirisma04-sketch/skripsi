<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\PasienController; 
use App\Http\Controllers\DashboardController;

/*
REDIRECT AWAL
*/
Route::get('/', function () {
    return redirect('/login');
});

/*
AUTH
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {
        return redirect()->route('dashboard'); // ✅ penting
    }

    return back()->with('error', 'Login gagal');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

/*
DASHBOARD 
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

/*
REKAM MEDIS
*/
Route::get('/rekam-medis/create/{kunjungan}', [RekamMedisController::class, 'create'])->name('rekam.create');
Route::post('/rekam-medis', [RekamMedisController::class, 'store'])->name('rekam.store');

/*
KUNJUNGAN
*/
Route::get('/kunjungans/create', [KunjunganController::class, 'create'])->middleware('auth');
Route::post('/kunjungans', [KunjunganController::class, 'store'])->middleware('auth');

/*
 PDF
*/
Route::get('/pasien/{id}/pdf', [PasienController::class, 'exportPdf'])->name('pasien.pdf');

/*
PASIEN (CRUD)
*/
Route::resource('pasiens', PasienController::class)->middleware('auth'); 

//buat input di dashboard
Route::get('/rekam-medis/create', [RekamMedisController::class, 'create'])
    ->name('rekam-medis.create');

Route::post('/rekam-medis/store', [RekamMedisController::class, 'store'])
    ->name('rekam-medis.store');