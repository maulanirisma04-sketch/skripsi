<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\Pdf; 

class PasienController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $pasiens = Pasien::when($search, function ($query, $search) {
        return $query->where('nama', 'like', '%' . $search . '%');
        })->get();
        return view('pasien.index', compact('pasiens', 'search'));
    }
    public function create(){
        return view('pasien.create');
    }
    public function store(Request $request){
        Pasien::create($request->except('_token'));
        return redirect()->route('pasiens.index'); 
    }
    public function show($id){
         $pasien = \App\Models\Pasien::with(['kunjungans.rekamMedis'])
        ->findOrFail($id);
        // ini deskending biar apa? biar kunjungan yang terbabru paling atas
        $pasien->kunjungans = $pasien->kunjungans->sortByDesc('tanggal_kunjungan');
        return view('pasien.show', compact('pasien'));
    }
    public function edit($id){
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id){
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->except('_token', '_method'));
        return redirect('/pasiens');
    }

    public function destroy($id){
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect('/pasiens');
        }
    public function exportPdf($id){
        $pasien = \App\Models\Pasien::with('kunjungans.rekamMedis')->findOrFail($id);
        $pdf = Pdf::loadView('pasien.pdf', compact('pasien'));
        return $pdf->download('laporan-pasien-'.$pasien->nama.'.pdf');
    }
}
