@extends('layouts.app')

@section('content')

<h1>Detail Pasien</h1>

<p>Nama: {{ $pasien->nama }}</p>

<hr>

<h3>Riwayat Kunjungan</h3>

@if($pasien->kunjungans->count() > 0)

    @foreach($pasien->kunjungans as $k)
<div class="card mb-3">
    <div class="card-body">

        <p><b>Tanggal:</b> {{ $k->tanggal_kunjungan }}</p>
        <p><b>Jenis:</b> {{ $k->jenis_pemeriksaan }}</p>

        @if($k->rekamMedis)

            <p><b>Tekanan Darah:</b> {{ $k->rekamMedis->tekanan_darah }}</p>
            <p><b>Suhu:</b> {{ $k->rekamMedis->suhu }}</p>
            <p><b>Berat Badan:</b> {{ $k->rekamMedis->berat_badan }}</p>

            <p><b>Diagnosis:</b> {{ $k->rekamMedis->diagnosis }}</p>
            <p><b>Catatan:</b> {{ $k->rekamMedis->catatan }}</p>

            <hr>

            {{-- ================== YANG FORM DINAMIS ================== --}}

            @if($k->jenis_pemeriksaan == 'kehamilan' && $k->rekamMedis->kehamilan)
                <h5>Data Kehamilan</h5>
                <p>Usia Kehamilan: {{ $k->rekamMedis->kehamilan->usia_kehamilan }}</p>
                <p>TFU: {{ $k->rekamMedis->kehamilan->tfu }}</p>
                <p>DJJ: {{ $k->rekamMedis->kehamilan->djj }}</p>
                <p>Posisi Janin: {{ $k->rekamMedis->kehamilan->posisi_janin }}</p>
            @endif

            @if($k->jenis_pemeriksaan == 'kb' && $k->rekamMedis->kb)
                <h5>Data KB</h5>
                <p>Jenis KB: {{ $k->rekamMedis->kb->jenis_kb }}</p>
                <p>Efek Samping: {{ $k->rekamMedis->kb->efek_samping }}</p>
                <p>Jadwal Berikutnya: {{ $k->rekamMedis->kb->jadwal_berikutnya }}</p>
            @endif

            @if($k->jenis_pemeriksaan == 'imunisasi' && $k->rekamMedis->imunisasi)
                <h5>Data Imunisasi</h5>
                <p>Jenis Imunisasi: {{ $k->rekamMedis->imunisasi->jenis_imunisasi }}</p>
                <p>Jadwal Berikutnya: {{ $k->rekamMedis->imunisasi->jadwal_berikutnya }}</p>
            @endif

            @if($k->jenis_pemeriksaan == 'persalinan' && $k->rekamMedis->persalinan)
                <h5>Data Persalinan</h5>
                <p>Jenis Persalinan: {{ $k->rekamMedis->persalinan->jenis_persalinan }}</p>
                <p>Berat Bayi: {{ $k->rekamMedis->persalinan->berat_bayi }}</p>
                <p>Tinggi Bayi: {{ $k->rekamMedis->persalinan->tinggi_bayi }}</p>
                <p>APGAR: {{ $k->rekamMedis->persalinan->apgar }}</p>
            @endif

        @else
            <span class="badge bg-warning">Belum ada rekam medis</span>

            <a href="{{ route('rekam.create', $k->id) }}" class="btn btn-primary btn-sm">
                Isi Rekam Medis
            </a>
        @endif

    </div>
</div>
@endforeach

@else

    <p>Belum ada kunjungan</p>

@endif

@endsection