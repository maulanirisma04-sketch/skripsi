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

                <!-- CEK ADA REKAM MEDIS ATAU BELUM -->
                @if($k->rekamMedis)
                    <p><b>Diagnosis:</b> {{ $k->rekamMedis->diagnosis }}</p>
                    <p><b>Catatan:</b> {{ $k->rekamMedis->catatan }}</p>
                @else
                    <span class="badge bg-warning">Belum ada rekam medis</span>

                    <!-- tombol isi rekam medis -->
                    <a href="/rekam-medis/create/{{ $k->id }}" class="btn btn-primary btn-sm">
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