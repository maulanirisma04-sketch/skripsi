<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\RekamMedisController; 

Route::get('/rekam-medis/create/{kunjungan}', [RekamMedisController::class, 'create'])->name('rekam.create');
Route::post('/rekam-medis', [RekamMedisController::class, 'store'])->name('rekam.store');
Route::get('/kunjungans/create', [KunjunganController::class, 'create']);
Route::post('/kunjungans', [KunjunganController::class, 'store']); 

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {

    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {
        return redirect('/dashboard');
    }

    return back()->with('error', 'Login gagal');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout'); 

Route::resource('pasiens', App\Http\Controllers\PasienController::class)->middleware('auth'); 