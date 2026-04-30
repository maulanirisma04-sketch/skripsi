<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use App\Models\Kehamilan;
use App\Models\Kb;
use App\Models\Imunisasi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔹 Statistik
        $totalPasien = Pasien::count();
        $statKehamilan = Kehamilan::count();
        $statKb = Kb::count();
        $statImunisasi = Imunisasi::count();
        $kunjunganHariIni = Kunjungan::whereDate('tanggal_kunjungan', Carbon::today())->count();
        $totalRekamMedis = RekamMedis::count();

        // JADWAL HARI INI 
$jadwalList = collect();

// KB
$kbList = Kb::whereDate('jadwal_berikutnya', now())->get();

foreach ($kbList as $kb) {
    $kunjungan = Kunjungan::find($kb->kunjungan_id ?? null);
    $pasien = $kunjungan ? Pasien::find($kunjungan->pasien_id) : null;

    $jadwalList->push([
        'nama' => $pasien->nama ?? '-',
        'jenis' => 'KB',
        'kunjungan_id' => $kunjungan->id ?? null
    ]);
}

// Imunisasi
$imunisasiList = Imunisasi::whereDate('jadwal_berikutnya', now())->get();

foreach ($imunisasiList as $imunisasi) {
    $kunjungan = Kunjungan::find($imunisasi->kunjungan_id ?? null);
    $pasien = $kunjungan ? Pasien::find($kunjungan->pasien_id) : null;

    $jadwalList->push([
        'nama' => $pasien->nama ?? '-',
        'jenis' => 'Imunisasi',
        'kunjungan_id' => $kunjungan->id ?? null
    ]);
}

$jadwalHariIni = $jadwalList->count();

        // 🔹 Grafik 7 hari
        $labels = [];
        $grafik = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $labels[] = $date->format('d M');
            $grafik[] = Kunjungan::whereDate('tanggal_kunjungan', $date)->count();
        }

        // 🔹 Kunjungan terbaru
        $latestKunjungan = Kunjungan::with('pasien')
            ->whereHas('pasien')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPasien',
            'totalRekamMedis',
            'kunjunganHariIni',
            'jadwalHariIni',
            'grafik',
            'labels',
            'latestKunjungan',
            'statKehamilan',
            'statKb',
            'statImunisasi',
            'jadwalList'
        ));
    }
}