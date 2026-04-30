<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Kunjungan;
use App\Models\Kehamilan;
use App\Models\Imunisasi;
use App\Models\Kb;
use App\Models\Persalinan;

class RekamMedisController extends Controller
{
    // FORM INPUT
    public function create($kunjungan_id)
    {
        $kunjungan = Kunjungan::with('pasien')->findOrFail($kunjungan_id);
        return view('rekam_medis.create', compact('kunjungan'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $kunjungan = Kunjungan::findOrFail($request->kunjungan_id);

        $rekam = RekamMedis::create([
            'kunjungan_id' => $kunjungan->id,
            'tekanan_darah' => $request->tekanan_darah,
            'suhu' => $request->suhu,
            'berat_badan' => $request->berat_badan,
            'diagnosis' => $request->diagnosis,
            'catatan' => $request->catatan,
        ]);

        // LOGIC BERDASARKAN JENIS
        switch ($kunjungan->jenis_pemeriksaan) {
            case 'kehamilan':
                Kehamilan::create([
                    'rekam_medis_id' => $rekam->id,
                    'usia_kehamilan' => $request->usia_kehamilan,
                    'tfu' => $request->tfu,
                    'djj' => $request->djj,
                ]);
                break;

            case 'imunisasi':
                Imunisasi::create([
                    'rekam_medis_id' => $rekam->id,
                    'kunjungan_id' => $kunjungan->id,
                    'jenis_imunisasi' => $request->jenis_imunisasi,
                    'jadwal_berikutnya' => $request->jadwal_berikutnya,
                ]);
                break;

            case 'kb':
                Kb::create([
                    'rekam_medis_id' => $rekam->id,
                    'kunjungan_id' => $kunjungan->id,
                    'jenis_kb' => $request->jenis_kb,
                    'efek_samping' => $request->efek_samping,
                    'jadwal_berikutnya' => $request->jadwal_berikutnya,
                ]);
                break;

            case 'persalinan':
                Persalinan::create([
                    'rekam_medis_id' => $rekam->id,
                    'jenis_persalinan' => $request->jenis_persalinan,
                    'berat_bayi' => $request->berat_bayi,
                    'tinggi_bayi' => $request->tinggi_bayi,
                    'apgar' => $request->apgar,
                    'anestesi' => $request->anestesi,
                ]);
                break;
        }

        return redirect('/pasiens/' . $kunjungan->pasien_id);
    }
}