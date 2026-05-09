<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;
use Barryvdh\DomPDF\Facade\Pdf; 

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = RekamMedis::with([
            'kunjungan.pasien'
        ]);

        // FILTER TANGGAL
        if($request->tanggal_awal && $request->tanggal_akhir){

            $query->whereHas('kunjungan', function($q) use ($request){

                $q->whereBetween('tanggal_kunjungan', [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]);

            });

        }

        $data = $query->latest()->get();

        return view('laporan.index', compact('data'));
    }
    public function kehamilan(Request $request){
    $data = RekamMedis::with([
        'kunjungan.pasien',
        'kehamilan'
    ])
    ->whereHas('kehamilan')
    ->get();

    return view('laporan.kehamilan', compact('data'));
    }

    public function imunisasi(Request $request){
    $data = RekamMedis::with([
        'kunjungan.pasien',
        'imunisasi'
    ])
    ->whereHas('imunisasi')
    ->get();

    return view('laporan.imunisasi', compact('data'));
    }

    public function kb(Request $request){
        $data = RekamMedis::with(
            ['kunjungan.pasien',
            'kb'
            ])
            ->whereHas('kb')
            ->get();
        return view('laporan.kb', compact('data'));
    }
     public function persalinan(Request $request){
        $data = RekamMedis::with(
            ['kunjungan.pasien',
            'persalinan'
            ])
            ->whereHas('persalinan')
            ->get();
        return view('laporan.persalinan', compact('data'));
    }

    public function exportPdf(Request $request)
    {
        $query = RekamMedis::with([
            'kunjungan.pasien'
        ]);

        // FILTER TANGGAL
        if($request->tanggal_awal && $request->tanggal_akhir){

            $query->whereHas('kunjungan', function($q) use ($request){

                $q->whereBetween('tanggal_kunjungan', [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]);

            });

        }

        $data = $query->latest()->get();

        $pdf = Pdf::loadView(
            'laporan.pdf',
            compact('data')
        );

        return $pdf->download('laporan-rekam-medis.pdf');
    }
}
