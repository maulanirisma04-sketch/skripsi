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
        }

    public function store(Request $request){
        $request->validate([
            'pasien_id' => 'required',
            'tanggal_kunjungan' => 'required',
            'jenis_pemeriksaan' => 'nullable'
        ]);\App\Models\Kunjungan::create([
            'pasien_id' => $request->pasien_id,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'jenis_pemeriksaan' => $request->jenis_pemeriksaan
        ]);
        return redirect('/pasiens');
    }
}
