@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Form Rekam Medis</h3>

    <form action="{{ route('rekam.store') }}" method="POST">
        @csrf

        <input type="hidden" name="kunjungan_id" value="{{ $kunjungan->id }}">

        <div class="mb-3">
            <label>Tekanan Darah</label>
            <input type="text" name="tekanan_darah" class="form-control">
        </div>

        <div class="mb-3">
            <label>Suhu</label>
            <input type="text" name="suhu" class="form-control">
        </div>

        <div class="mb-3">
            <label>Berat Badan</label>
            <input type="text" name="berat_badan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Diagnosis</label>
            <input type="text" name="diagnosis" class="form-control">
        </div>

        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control"></textarea>
        </div>
        @if($kunjungan->jenis_pemeriksaan == 'imunisasi')

    <div class="mb-3">
        <label>Jenis Imunisasi</label>
        <input type="text" name="jenis_imunisasi" class="form-control">
    </div>

    <div class="mb-3">
        <label>Jadwal Berikutnya</label>
        <input type="date" name="jadwal_berikutnya" class="form-control">
    </div>
    @endif

    @if($kunjungan->jenis_pemeriksaan == 'kehamilan')

    <div class="mb-3">
        <label>Usia Kehamilan</label>
        <input type="text" name="usia_kehamilan" class="form-control">
    </div>
    <div class="mb-3">
    <label>Tinggi Fudus Uteri</label>
    <input type="text" name="tfu" class="form-control">
    </div>

    <div class="mb-3">
        <label>Denyut Jantung Janin</label>
        <input type="text" name="djj" class="form-control">
    </div>

    <div class="mb-3">
        <label>Posisi Janin</label>
        <input type="text" name="posisi_janin" class="form-control">
    </div>
    @endif

    @if($kunjungan->jenis_pemeriksaan == 'kb')

        <div class="mb-3">
            <label>Jenis KB</label>
            <input type="text" name="jenis_kb" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jadwal Berikutnya</label>
            <input type="date" name="jadwal_berikutnya" class="form-control">
        </div>
        <div class="mb-3">
            <label>Efek Samping</label>
            <input type="text" name="efek_samping" class="form-control">
        </div>
    @endif

    @if($kunjungan->jenis_pemeriksaan == 'persalinan')

        <div class="mb-3">
            <label>Jenis Persalinan</label>
            <input type="text" name="jenis_persalinan" class="form-control">
        </div>
        <div class="mb-3">
            <label>APGAR</label>
            <input type="text" name="apgar" class="form-control">
        </div>
        <div class="mb-3">
            <label>Anestesi</label>
            <input type="text" name="anestesi" class="form-control">
        </div>
                <div class="mb-3">
            <label>Tinggi Bayi</label>
            <input type="text" name="tinggi_bayi" class="form-control">
        </div>
                <div class="mb-3">
            <label>Berat Bayu</label>
            <input type="text" name="berat_bayi" class="form-control">
        </div>
    @endif

    @if($kunjungan->jenis_pemeriksaan == 'kehamilan')
        <input type="text" name="usia_kehamilan">
    @endif

    @if($kunjungan->jenis_pemeriksaan == 'kb')
        <input type="text" name="jenis_kb">
    @endif

    @if($kunjungan->jenis_pemeriksaan == 'persalinan')
        <input type="text" name="jenis_persalinan">
    @endif

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection