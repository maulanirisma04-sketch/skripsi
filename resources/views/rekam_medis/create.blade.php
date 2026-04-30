@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Isi Rekam Medis</h3>

    <form action="{{ route('rekam-medis.store') }}" method="POST">
        @csrf

        <!-- 🔹 Hidden kunjungan -->
        <input type="hidden" name="kunjungan_id" value="{{ $kunjungan->id }}">

        <!-- 🔹 Info Pasien -->
        <div class="mb-3">
            <label>Nama Pasien</label>
            <input type="text" class="form-control"
                value="{{ optional($kunjungan->pasien)->nama }}"
                readonly>
        </div>

        <div class="mb-3">
            <label>Tanggal Kunjungan</label>
            <input type="text" class="form-control"
                value="{{ $kunjungan->tanggal_kunjungan }}"
                readonly>
        </div>

        <!-- 🔹 Rekam Medis Umum -->
        <div class="mb-3">
            <label>Tekanan Darah</label>
            <input type="text" name="tekanan_darah" class="form-control">
        </div>

        <div class="mb-3">
            <label>Suhu</label>
            <input type="number" step="0.1" name="suhu" class="form-control">
        </div>

        <div class="mb-3">
            <label>Berat Badan</label>
            <input type="number" step="0.1" name="berat_badan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Diagnosis</label>
            <textarea name="diagnosis" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control"></textarea>
        </div>

        <!--  FORM TAMBAHAN BERDASARKAN JENIS -->
        @if($kunjungan->jenis_pemeriksaan == 'kehamilan')
            <div class="mb-3">
                <label>Usia Kehamilan</label>
                <input type="text" name="usia_kehamilan" class="form-control">
            </div>

            <div class="mb-3">
                <label>TFU</label>
                <input type="text" name="tfu" class="form-control">
            </div>

            <div class="mb-3">
                <label>DJJ</label>
                <input type="text" name="djj" class="form-control">
            </div>
        @endif

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

        @if($kunjungan->jenis_pemeriksaan == 'kb')
            <div class="mb-3">
                <label>Jenis KB</label>
                <input type="text" name="jenis_kb" class="form-control">
            </div>

            <div class="mb-3">
                <label>Efek Samping</label>
                <input type="text" name="efek_samping" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jadwal Berikutnya</label>
                <input type="date" name="jadwal_berikutnya" class="form-control">
            </div>
        @endif

        @if($kunjungan->jenis_pemeriksaan == 'persalinan')
            <div class="mb-3">
                <label>Jenis Persalinan</label>
                <input type="text" name="jenis_persalinan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Berat Bayi</label>
                <input type="number" name="berat_bayi" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tinggi Bayi</label>
                <input type="number" name="tinggi_bayi" class="form-control">
            </div>

            <div class="mb-3">
                <label>APGAR</label>
                <input type="text" name="apgar" class="form-control">
            </div>

            <div class="mb-3">
                <label>Anestesi</label>
                <input type="text" name="anestesi" class="form-control">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Simpan</button>

    </form>
</div>

@endsection