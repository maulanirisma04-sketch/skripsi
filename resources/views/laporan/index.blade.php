@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 style="
                color:#7b5b8e;
                font-weight:700;
            ">
                Semua Laporan
            </h3>

            <small class="text-muted">
                Data seluruh pemeriksaan pasien
            </small>

        </div>

    </div>

    <!-- FILTER -->
    <div class="card border-0 shadow-sm mb-4"
         style="
            border-radius:20px;
            background:white;
         ">

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <!-- TANGGAL AWAL -->
                    <div class="col-md-4">

                        <label style="
                            color:#7b5b8e;
                            font-weight:600;
                        ">
                            Tanggal Awal
                        </label>

                        <input type="date"
                               name="tanggal_awal"
                               value="{{ request('tanggal_awal') }}"
                               class="form-control"
                               style="
                                    border-radius:12px;
                               ">

                    </div>

                    <!-- TANGGAL AKHIR -->
                    <div class="col-md-4">

                        <label style="
                            color:#7b5b8e;
                            font-weight:600;
                        ">
                            Tanggal Akhir
                        </label>

                        <input type="date"
                               name="tanggal_akhir"
                               value="{{ request('tanggal_akhir') }}"
                               class="form-control"
                               style="
                                    border-radius:12px;
                               ">

                    </div>

                    <!-- BUTTON -->
                    <div class="col-md-4 d-flex align-items-end">

                        <button class="btn text-white w-100"
                                style="
                                    background:linear-gradient(
                                        135deg,
                                        #bb67b5,
                                        #d991d4
                                    );

                                    border:none;

                                    border-radius:12px;

                                    height:45px;

                                    font-weight:600;
                                ">

                            <i class="fas fa-filter"></i>

                            Filter Laporan

                        </button>

                    </div>

                </div>

            </form>

        </div>

        <!-- EXPORT PDF -->
        <div class="px-3 pb-3">

            <a href="{{ route('laporan.pdf', [
                'tanggal_awal' => request('tanggal_awal'),
                'tanggal_akhir' => request('tanggal_akhir')
            ]) }}"
            class="btn btn-danger">

                <i class="fas fa-file-pdf"></i>
                Export PDF

            </a>

        </div>

    </div>

    <!-- TABLE -->
    <div class="card border-0 shadow-sm"
         style="
            border-radius:20px;
            overflow:hidden;
         ">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead style="
                        background:#fff0f7;
                        color:#7b5b8e;
                    ">

                        <tr>

                            <th>Nama Pasien</th>

                            <th>Tanggal</th>

                            <th>Jenis Pemeriksaan</th>

                            <th>Diagnosis</th>

                            <th>Catatan</th>

                            <th>Resep Obat</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $d)

                        <tr>

                            <!-- NAMA -->
                            <td>

                                <div class="d-flex align-items-center">

                                    <div style="
                                        width:38px;
                                        height:38px;

                                        border-radius:12px;

                                        background:#fff2dc;

                                        display:flex;
                                        align-items:center;
                                        justify-content:center;

                                        margin-right:10px;

                                        color:#f5a613;
                                    ">

                                        <i class="fas fa-user"></i>

                                    </div>

                                    {{ $d->kunjungan->pasien->nama ?? '-' }}

                                </div>

                            </td>

                            <!-- TANGGAL -->
                            <td>

                                {{ $d->kunjungan->tanggal_kunjungan ?? '-' }}

                            </td>

                            <!-- JENIS -->
                            <td>

                                @php

                                    $warna = [
                                        'kehamilan' => 'success',
                                        'imunisasi' => 'primary',
                                        'kb' => 'warning',
                                        'persalinan' => 'danger'
                                    ];

                                @endphp

                                <span class="badge bg-{{ $warna[$d->kunjungan->jenis_pemeriksaan] ?? 'secondary' }}"
                                      style="
                                        padding:8px 12px;
                                        border-radius:10px;
                                        font-size:13px;
                                      ">

                                    {{ strtoupper($d->kunjungan->jenis_pemeriksaan ?? '-') }}

                                </span>

                            </td>

                            <!-- DIAGNOSIS -->
                            <td>

                                {{ $d->diagnosis ?? '-' }}

                            </td>

                            <!-- CATATAN -->
                            <td>

                                {{ $d->catatan ?? '-' }}

                            </td>

                            <!-- RESEP OBAT -->
                            <td>

                                {{ $d->resep_obat ?? '-' }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5 text-muted">

                                <i class="fas fa-folder-open fa-2x mb-3"></i>

                                <br>

                                Tidak ada data laporan

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection