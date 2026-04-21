@extends('layouts.app')

@section('content')

<section class="content">
<div class="container-fluid">

    <!-- HEADER PASIEN -->
     <a href="{{ route('pasien.pdf', $pasien->id) }}" class="btn btn-danger mb-3">
    <i class="fas fa-file-pdf"></i> Export PDF </a>
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">{{ $pasien->nama }}</h4>
                <small class="text-muted">Data Pasien</small>
            </div>
            <i class="fas fa-user fa-2x text-primary"></i>
        </div>
    </div>

    <!-- RIWAYAT -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Riwayat Kunjungan</h3>
        </div>

        <div class="card-body">

        @forelse($pasien->kunjungans as $k)

        <div class="card mb-3 border-left-primary shadow-sm">
            <div class="card-body">

                <!-- HEADER KUNJUNGAN -->
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="mb-1">
                            <i class="fas fa-calendar"></i>
                            {{ $k->tanggal_kunjungan }}
                        </h6>

                        @php
                            $warna = [
                                'kehamilan' => 'success',
                                'kb' => 'warning',
                                'imunisasi' => 'primary',
                                'persalinan' => 'danger'
                            ];
                        @endphp

                        <span class="badge bg-{{ $warna[$k->jenis_pemeriksaan] ?? 'secondary' }}">
                            {{ strtoupper($k->jenis_pemeriksaan) }}
                        </span>
                    </div>

                    @if(!$k->rekamMedis)
                        <a href="{{ route('rekam.create', $k->id) }}" 
                           class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i> Isi
                        </a>
                    @endif
                </div>

                <hr>

                @if($k->rekamMedis)

                <!-- GRID UMUM -->
                <div class="row text-center mb-3">
                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <small>Tekanan Darah</small>
                            <div><b>{{ $k->rekamMedis->tekanan_darah ?? '-' }}</b></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <small>Suhu Tubuh</small>
                            <div><b>{{ $k->rekamMedis->suhu ?? '-' }}</b></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-2 bg-light rounded">
                            <small>Berat Badan</small>
                            <div><b>{{ $k->rekamMedis->berat_badan ?? '-' }}</b></div>
                        </div>
                    </div>
                </div>

                <p><b>Diagnosis:</b> {{ $k->rekamMedis->diagnosis ?? '-' }}</p>
                <p><b>Keluhan :</b> {{ $k->rekamMedis->catatan ?? '-' }}</p>

                <!-- DETAIL SESUAI JENIS -->
                <div class="mt-3">

                @if($k->rekamMedis->kehamilan)
                    <div class="alert alert-success">
                        <b>Kehamilan</b><br>
                        Usia: {{ $k->rekamMedis->kehamilan->usia_kehamilan }} minggu |
                        Tinggi Fudus Uteri: {{ $k->rekamMedis->kehamilan->tfu }} cm |
                        Detak Jantung Janin : {{ $k->rekamMedis->kehamilan->djj }} |
                        Posisi: {{ $k->rekamMedis->kehamilan->posisi_janin }}
                    </div>
                @endif

                @if($k->rekamMedis->kb)
                    <div class="alert alert-warning">
                        <b>KB</b><br>
                        Jenis: {{ $k->rekamMedis->kb->jenis_kb }} |
                        Efek: {{ $k->rekamMedis->kb->efek_samping }} |
                        Jadwal: {{ $k->rekamMedis->kb->jadwal_berikutnya }}
                    </div>
                @endif

                @if($k->rekamMedis->imunisasi)
                    <div class="alert alert-primary">
                        <b>Imunisasi</b><br>
                        Jenis Vaksin : {{ $k->rekamMedis->imunisasi->jenis_imunisasi }} |
                        Jadwal: {{ $k->rekamMedis->imunisasi->jadwal_berikutnya }}
                    </div>
                @endif

                @if($k->rekamMedis->persalinan)
                    <div class="alert alert-danger">
                        <b>Persalinan</b><br>
                        Jenis: {{ $k->rekamMedis->persalinan->jenis_persalinan }} |
                        Berat Badan Bayi : {{ $k->rekamMedis->persalinan->berat_bayi }} |
                        Tinggi Bayi: {{ $k->rekamMedis->persalinan->tinggi_bayi }} |
                        APGAR: {{ $k->rekamMedis->persalinan->apgar }}
                    </div>
                @endif

                </div>

                @endif

            </div>
        </div>

        @empty

        <!-- EMPTY STATE -->
        <div class="text-center text-muted p-4">
            <i class="fas fa-folder-open fa-2x mb-2"></i>
            <p>Belum ada kunjungan</p>
        </div>

        @endforelse

        </div>
    </div>

</div>
</section>

@endsection