@extends('layouts.app')

@section('content')

<style>

    .page-title{
        color: #bb67b5;
        font-weight: bold;
    }

    .card-custom{
        border-radius: 18px;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .patient-header{
        background: linear-gradient(
            135deg,
            #f7d9f5,
            #ffffff
        );
        border-radius: 18px;
        border: none;
    }

    .patient-icon{
        width: 70px;
        height: 70px;
        background: #bb67b5;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .history-card{
        border-radius: 15px;
        border: none;
        box-shadow: 0 3px 12px rgba(0,0,0,0.06);
    }

    .section-title{
        color: #7a3d76;
        font-weight: bold;
    }

    .info-box-custom{
        background: #faf5fb;
        border-radius: 12px;
        padding: 15px;
    }

    .btn-custom{
        background-color: #bb67b5;
        border-color: #bb67b5;
        color: white;
        border-radius: 10px;
        font-weight: 600;
    }

    .btn-custom:hover{
        background-color: #a956a3;
        border-color: #a956a3;
        color: white;
    }

    .badge{
        padding: 8px 12px;
        border-radius: 8px;
    }

    .alert{
        border-radius: 12px;
    }

</style>

<section class="content">

<div class="container-fluid">

    <!-- BUTTON PDF -->
    <a href="{{ route('pasien.pdf', $pasien->id) }}" 
       class="btn btn-danger mb-3">

        <i class="fas fa-file-pdf"></i>
        Export PDF

    </a>

    <!-- HEADER PASIEN -->
    <div class="card patient-header shadow-sm mb-4">

        <div class="card-body d-flex justify-content-between align-items-center">

            <div>

                <h3 class="page-title mb-1">
                    {{ $pasien->nama }}
                </h3>

                <small class="text-muted">
                    Data Rekam Medis Pasien
                </small>

            </div>

            <div class="patient-icon">
                <i class="fas fa-user"></i>
            </div>

        </div>

    </div>

    <!-- RIWAYAT -->
    <div class="card card-custom">

        <div class="card-header bg-white">

            <h3 class="section-title mb-0">
                Riwayat Kunjungan
            </h3>

        </div>

        <div class="card-body">

        @forelse($pasien->kunjungans as $k)

        <div class="card history-card mb-4">

            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h6 class="mb-2">

                            <i class="fas fa-calendar-alt text-muted"></i>

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
                           class="btn btn-custom btn-sm">

                            <i class="fas fa-plus"></i>
                            Isi Rekam Medis

                        </a>

                    @endif

                </div>

                <hr>

                @if($k->rekamMedis)

                <!-- DATA UMUM -->
                <div class="row text-center mb-4">

                    <div class="col-md-4 mb-3">

                        <div class="info-box-custom">

                            <small class="text-muted">
                                Tekanan Darah
                            </small>

                            <h5 class="mt-2">
                                {{ $k->rekamMedis->tekanan_darah ?? '-' }}
                            </h5>

                        </div>

                    </div>

                    <div class="col-md-4 mb-3">

                        <div class="info-box-custom">

                            <small class="text-muted">
                                Suhu Tubuh
                            </small>

                            <h5 class="mt-2">
                                {{ $k->rekamMedis->suhu ?? '-' }}
                            </h5>

                        </div>

                    </div>

                    <div class="col-md-4 mb-3">

                        <div class="info-box-custom">

                            <small class="text-muted">
                                Berat Badan
                            </small>

                            <h5 class="mt-2">
                                {{ $k->rekamMedis->berat_badan ?? '-' }}
                            </h5>

                        </div>

                    </div>

                </div>

                <!-- DIAGNOSIS -->
                <div class="mb-3">

                    <p>
                        <b>Diagnosis :</b>
                        {{ $k->rekamMedis->diagnosis ?? '-' }}
                    </p>

                    <p>
                        <b>Keluhan :</b>
                        {{ $k->rekamMedis->catatan ?? '-' }}
                    </p>

                </div>

                <!-- DETAIL -->
                <div class="mt-3">

                @if($k->rekamMedis->kehamilan)

                    <div class="alert alert-success">

                        <b>Kehamilan</b><br>

                        Usia:
                        {{ $k->rekamMedis->kehamilan->usia_kehamilan }} minggu |

                        TFU:
                        {{ $k->rekamMedis->kehamilan->tfu }} cm |

                        DJJ:
                        {{ $k->rekamMedis->kehamilan->djj }} |

                        Posisi:
                        {{ $k->rekamMedis->kehamilan->posisi_janin }}

                    </div>

                @endif

                @if($k->rekamMedis->kb)

                    <div class="alert alert-warning">

                        <b>KB</b><br>

                        Jenis:
                        {{ $k->rekamMedis->kb->jenis_kb }} |

                        Efek:
                        {{ $k->rekamMedis->kb->efek_samping }} |

                        Jadwal:
                        {{ $k->rekamMedis->kb->jadwal_berikutnya }}

                    </div>

                @endif

                @if($k->rekamMedis->imunisasi)

                    <div class="alert alert-primary">

                        <b>Imunisasi</b><br>

                        Jenis:
                        {{ $k->rekamMedis->imunisasi->jenis_imunisasi }} |

                        Jadwal:
                        {{ $k->rekamMedis->imunisasi->jadwal_berikutnya }}

                    </div>

                @endif

                @if($k->rekamMedis->persalinan)

                    <div class="alert alert-danger">

                        <b>Persalinan</b><br>

                        Jenis:
                        {{ $k->rekamMedis->persalinan->jenis_persalinan }} |

                        Berat Bayi:
                        {{ $k->rekamMedis->persalinan->berat_bayi }} |

                        Tinggi Bayi:
                        {{ $k->rekamMedis->persalinan->tinggi_bayi }} |

                        APGAR:
                        {{ $k->rekamMedis->persalinan->apgar }}

                    </div>

                @endif

                </div>

                @endif

            </div>

        </div>

        @empty

        <!-- EMPTY -->
        <div class="text-center text-muted p-5">

            <i class="fas fa-folder-open fa-3x mb-3"></i>

            <p>
                Belum ada riwayat kunjungan
            </p>

        </div>

        @endforelse

        </div>

    </div>

</div>

</section>

@endsection 