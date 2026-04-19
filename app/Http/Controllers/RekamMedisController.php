<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function create($kunjungan_id){
        $kunjungan = \App\Models\Kunjungan::with('pasien')->findOrFail($kunjungan_id);
        return view('rekam_medis.create', compact('kunjungan'));
    }
    public function store(Request $request){
        $rekam = \App\Models\RekamMedis::create([
            'kunjungan_id' => $request->kunjungan_id,
            'tekanan_darah' => $request->tekanan_darah,
            'suhu' => $request->suhu,
            'berat_badan' => $request->berat_badan,
            'diagnosis' => $request->diagnosis,
            'catatan' => $request->catatan,
        ]);

        $kunjungan = \App\Models\Kunjungan::find($request->kunjungan_id);

            if ($kunjungan->jenis_pemeriksaan == 'kehamilan') {
                \App\Models\Kehamilan::create([
                'rekam_medis_id' => $rekam->id,
                'usia_kehamilan' => $request->usia_kehamilan,
                'tfu'=> $request->tfu,
                'djj'=> $request->djj 
                ]);
            } 
            if ($kunjungan->jenis_pemeriksaan == 'imunisasi') {
                \App\Models\Imunisasi::create([
                'rekam_medis_id' => $rekam->id,
                'jenis_imunisasi' => $request->jenis_imunisasi,
                'jadwal_berikutnya' => $request->jadwal_berikutnya
                ]);
            }

            if ($kunjungan->jenis_pemeriksaan == 'kb') {
                \App\Models\Kb::create([
                'rekam_medis_id' => $rekam->id,
                'jenis_kb' => $request->jenis_kb,
                'efek_samping' => $request->efek_samping,
                'jadwal_berikutnya' => $request->jadwal_berikutnya
            ]);
            }

            if ($kunjungan->jenis_pemeriksaan == 'persalinan') {
                \App\Models\Persalinan::create([
                'rekam_medis_id' => $rekam->id,
                'jenis_persalinan' => $request->jenis_persalinan,
                'berat_bayi'=> $request->berat_bayi,
                'tinggi_bayi' => $request->tinggi_bayi,
                'apgar' => $request->apgar,
                'anestesi' => $request->anestesi
            ]);
            }

        return redirect('/pasiens/'.$kunjungan->pasien_id);
    }
}
