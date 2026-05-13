<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use App\Models\Pasien;
class KunjunganController extends Controller
{
    public function create(){
         $pasiens = \App\Models\Pasien::all();
        return view('kunjungan.create', compact('pasiens'));

        $antrian = \App\Models\Kunjungan::whereDate(
        'tanggal_kunjungan',
        now()->toDateString()
        )->count() + 1;
        }

    public function store(Request $request){
        $request->validate([
            'pasien_id' => 'required',
            'tanggal_kunjungan' => 'required',
            'jenis_pemeriksaan' => 'nullable'
        ]);

        $antrian = \App\Models\Kunjungan::whereDate(
            'tanggal_kunjungan',
            $request->tanggal_kunjungan
        )->count() + 1;

        $kunjungan = \App\Models\Kunjungan::create([
            'pasien_id' => $request->pasien_id,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'jenis_pemeriksaan' => $request->jenis_pemeriksaan,
            'nomor_antrian' => $antrian
        ]);

        return redirect()
            ->route('antrian.download', $kunjungan->id);


        }
    public function downloadAntrian($id){
        $kunjungan = Kunjungan::with('pasien')->findOrFail($id);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
            'kunjungan.antrian_pdf',
            compact('kunjungan')
        );

        return $pdf->download('antrian-'.$kunjungan->nomor_antrian.'.pdf');
    }
} 