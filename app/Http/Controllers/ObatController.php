<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::latest()->get();

        return view('obat.index', compact('obats'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'satuan' => 'required',
            'stok' => 'required|integer'
        ]);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'satuan' => $request->satuan,
            'stok' => $request->stok
        ]);

        return redirect()->route('obats.index')
            ->with('success', 'Data obat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);

        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'satuan' => 'required',
            'stok' => 'required|integer'
        ]);

        $obat = Obat::findOrFail($id);

        $obat->update([
            'nama_obat' => $request->nama_obat,
            'satuan' => $request->satuan,
            'stok' => $request->stok
        ]);

        return redirect()->route('obats.index')
            ->with('success', 'Data obat berhasil diupdate');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);

        $obat->delete();

        return redirect()->route('obats.index')
            ->with('success', 'Data obat berhasil dihapus');
    }
}