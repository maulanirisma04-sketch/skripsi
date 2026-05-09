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
        // =========================
        // STATISTIK
        // =========================
        $totalPasien = Pasien::count();

        $statKehamilan = Kehamilan::count();

        $statKb = Kb::count();

        $statImunisasi = Imunisasi::count();

        $kunjunganHariIni = Kunjungan::whereDate(
            'tanggal_kunjungan',
            Carbon::today()
        )->count();

        $totalRekamMedis = RekamMedis::count();


        // =========================
        // JADWAL HARI INI
        // =========================
        $jadwalList = collect();


        // =========================
        // IMUNISASI
        // =========================
        $imunisasiList = Imunisasi::with(
            'rekamMedis.kunjungan.pasien'
        )
        ->whereDate(
            'jadwal_berikutnya',
            Carbon::today()
        )
        ->get();

        foreach ($imunisasiList as $imunisasi) {

            $kunjungan = $imunisasi->rekamMedis?->kunjungan;

            $pasien = $kunjungan?->pasien;

            if ($pasien) {

                $jadwalList->push([

                    'nama' => $pasien->nama,

                    'jenis' => 'Imunisasi',

                    'pasien_id' => $pasien->id
                ]);
            }
        }


        // =========================
        // KB
        // =========================
        $kbList = Kb::with(
            'rekamMedis.kunjungan.pasien'
        )
        ->whereDate(
            'jadwal_berikutnya',
            Carbon::today()
        )
        ->get();

        foreach ($kbList as $kb) {

            $kunjungan = $kb->rekamMedis?->kunjungan;

            $pasien = $kunjungan?->pasien;

            if ($pasien) {

                $jadwalList->push([

                    'nama' => $pasien->nama,

                    'jenis' => 'KB',

                    'pasien_id' => $pasien->id
                ]);
            }
        }


        $jadwalHariIni = $jadwalList->count();


        // =========================
        // GRAFIK 7 HARI
        // =========================
        $labels = [];

        $grafik = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = Carbon::today()->subDays($i);

            $labels[] = $date->format('d M');

            $grafik[] = Kunjungan::whereDate(
                'tanggal_kunjungan',
                $date
            )->count();
        }


        // =========================
        // KUNJUNGAN TERBARU
        // =========================
        $latestKunjungan = Kunjungan::with('pasien')
            ->whereHas('pasien')
            ->latest()
            ->take(5)
            ->get();


        // =========================
        // RETURN VIEW
        // =========================
        return view('dashboard', compact(

            'totalPasien',

            'statKehamilan',

            'statKb',

            'statImunisasi',

            'kunjunganHariIni',

            'totalRekamMedis',

            'jadwalHariIni',

            'jadwalList',

            'labels',

            'grafik',

            'latestKunjungan'
        ));
    }
}