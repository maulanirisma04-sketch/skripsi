<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
       $totalPasien = Pasien::count();
        $totalRekamMedis = RekamMedis::count();

        $kunjunganHariIni = Kunjungan::whereDate('tanggal_kunjungan', Carbon::today())->count();

        $jadwalHariIni = RekamMedis::whereHas('kb', function($q){
            $q->whereDate('jadwal_berikutnya', now());
        })->orWhereHas('imunisasi', function($q){
            $q->whereDate('jadwal_berikutnya', now());
        })->count();

        $grafik = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i)->format('Y-m-d');
            $grafik[] = Kunjungan::whereDate('tanggal_kunjungan', $tanggal)->count();
        }

        $latestKunjungan = Kunjungan::with('pasien')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPasien',
            'totalRekamMedis',
            'kunjunganHariIni',
            'jadwalHariIni',
            'grafik',
            'latestKunjungan'
        ));

    }

}