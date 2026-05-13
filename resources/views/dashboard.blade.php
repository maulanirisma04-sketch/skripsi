@extends('layouts.app')

@section('content')

<style>

    .dashboard-title{
        color: #bb67b5;
        font-weight: bold;
    }

    .card-custom{
        border-radius: 18px;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .card-header-custom{
        background: white;
        border-bottom: 1px solid #f0e0ef;
        border-top-left-radius: 18px !important;
        border-top-right-radius: 18px !important;
    }

    .card-title-custom{
        color: #7a3d76;
        font-weight: bold;
        margin: 0;
    }

    .table thead{
        background-color: #f7d9f5;
        color: #7a3d76;
    }

    .table{
        border-radius: 10px;
        overflow: hidden;
    }

    .info-box-custom{
        background: #faf5fb;
        border-radius: 12px;
        padding: 15px;
    }

    .badge{
        padding: 8px 12px;
        border-radius: 8px;
    }

</style>

<div class="container-fluid">

    <h2 class="mb-4 dashboard-title">
        Dashboard
    </h2>

    <!-- COMPANY PROFILE -->
    <div class="card card-custom mb-4">

        <div class="card-header card-header-custom">

            <h3 class="card-title-custom">
                Profil Praktik Bidan
            </h3>

        </div>

        <div class="card-body">

            <!-- FOTO TEMPAT -->
            <div class="mb-4">

                <img src="{{ asset('assets/img/tempat-praktik.jpg') }}"
                     class="img-fluid rounded shadow-sm"
                     style="
                        width:100%;
                        max-height:350px;
                        object-fit:cover;
                     ">

            </div>

            <!-- DESKRIPSI -->
            <div class="mb-5">

                <h3 style="
                    color:#7a3d76;
                    font-weight:bold;
                ">

                    Praktik Mandiri Bidan Fithriana

                </h3>

                <p class="text-muted mt-3"
                   style="
                        line-height:1.9;
                        text-align:justify;
                   ">

                    Praktik Mandiri Bidan Fithriana merupakan layanan 
                    kesehatan yang berfokus pada pelayanan ibu dan anak 
                    dengan memberikan pelayanan yang profesional, aman, dan 
                    nyaman bagi pasien. Praktik Mandiri Bidan Fithriana 
                    berlokasi di Jalan Letda Lukito No. 12, Desa Jatiroke RT 
                    01 RW 04, Kecamatan Jatinangor. Dengan mengutamakan 
                    kualitas pelayanan dan kenyamanan pasien, praktik ini 
                    menyediakan berbagai layanan kesehatan seperti 
                    pemeriksaan kehamilan, pelayanan KB, imunisasi, 
                    persalinan, serta pemeriksaan kesehatan ibu dan anak.

                </p>

                <!-- LAYANAN -->
                <div class="row mt-4">

                    <div class="col-md-3 mb-3">

                        <div class="info-box-custom text-center">

                            <i class="fas fa-baby mb-2"
                               style="
                                    font-size:28px;
                                    color:#bb67b5;
                               ">
                            </i>

                            <h6 class="mb-1"
                                style="
                                    color:#7a3d76;
                                    font-weight:bold;
                                ">

                                Kehamilan

                            </h6>

                            <small class="text-muted">
                                Pemeriksaan ibu hamil
                            </small>

                        </div>

                    </div>

                    <div class="col-md-3 mb-3">

                        <div class="info-box-custom text-center">

                            <i class="fas fa-syringe mb-2"
                               style="
                                    font-size:28px;
                                    color:#bb67b5;
                               ">
                            </i>

                            <h6 class="mb-1"
                                style="
                                    color:#7a3d76;
                                    font-weight:bold;
                                ">

                                KB

                            </h6>

                            <small class="text-muted">
                                Pelayanan keluarga berencana
                            </small>

                        </div>

                    </div>

                    <div class="col-md-3 mb-3">

                        <div class="info-box-custom text-center">

                            <i class="fas fa-shield-virus mb-2"
                               style="
                                    font-size:28px;
                                    color:#bb67b5;
                               ">
                            </i>

                            <h6 class="mb-1"
                                style="
                                    color:#7a3d76;
                                    font-weight:bold;
                                ">

                                Imunisasi

                            </h6>

                            <small class="text-muted">
                                Imunisasi bayi & anak
                            </small>

                        </div>

                    </div>

                    <div class="col-md-3 mb-3">

                        <div class="info-box-custom text-center">

                            <i class="fas fa-heartbeat mb-2"
                               style="
                                    font-size:28px;
                                    color:#bb67b5;
                               ">
                            </i>

                            <h6 class="mb-1"
                                style="
                                    color:#7a3d76;
                                    font-weight:bold;
                                ">

                                Persalinan

                            </h6>

                            <small class="text-muted">
                                Pelayanan persalinan
                            </small>

                        </div>

                    </div>

                </div>

            </div>

            <!-- FOTO BIDAN -->
            <div class="row text-center">

                <div class="col-md-6 mb-4">

                    <div class="p-3">

                        <img src="{{ asset('assets/img/bidan1.jpg') }}"
                             class="img-fluid rounded-circle shadow"
                             style="
                                width:180px;
                                height:180px;
                                object-fit:cover;
                             ">

                        <h5 class="mt-3 mb-1"
                            style="
                                color:#7a3d76;
                                font-weight:bold;
                            ">

                            Bidan Fithriana

                        </h5>

                        <small class="text-muted">
                            Pelayanan Kesehatan
                        </small>

                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="p-3">

                        <img src="{{ asset('assets/img/bidan2.jpg') }}"
                             class="img-fluid rounded-circle shadow"
                             style="
                                width:180px;
                                height:180px;
                                object-fit:cover;
                             ">

                        <h5 class="mt-3 mb-1"
                            style="
                                color:#7a3d76;
                                font-weight:bold;
                            ">

                            Bidan Afifah

                        </h5>

                        <small class="text-muted">
                            Pelayanan Kesehatan
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- GRAFIK -->
    <div class="card card-custom mb-4">

        <div class="card-header card-header-custom">

            <h3 class="card-title-custom">
                Grafik Kunjungan 7 Hari Terakhir
            </h3>

        </div>

        <div class="card-body">

            <canvas id="chartKunjungan"></canvas>

        </div>

    </div>

    <!-- JADWAL -->
    <div class="card card-custom mb-4">

        <div class="card-header card-header-custom">

            <h3 class="card-title-custom">
                Jadwal Hari Ini
            </h3>

        </div>

        <div class="card-body">

            @if($jadwalList->count() > 0)

                <table class="table table-hover">

                    <thead>

                        <tr>
                            <th>Nama Pasien</th>
                            <th>Jenis</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($jadwalList as $j)

                        <tr>

                            <td>
                                {{ $j['nama'] ?? '-' }}
                            </td>

                            <td>

                                @if(($j['jenis'] ?? '') == 'Imunisasi')

                                    <span class="badge badge-info">
                                        Imunisasi
                                    </span>

                                @elseif(($j['jenis'] ?? '') == 'KB')

                                    <span class="badge badge-warning">
                                        KB
                                    </span>

                                @else

                                    <span class="badge badge-secondary">
                                        -
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="text-center text-muted py-4">

                    <i class="fas fa-calendar-times fa-2x mb-2"></i>

                    <p class="mt-2 mb-0">
                        Tidak ada jadwal hari ini
                    </p>

                </div>

            @endif

        </div>

    </div>

    <!-- KUNJUNGAN TERBARU -->
    <div class="card card-custom">

        <div class="card-header card-header-custom">

            <h3 class="card-title-custom">
                Kunjungan Terbaru
            </h3>

        </div>

        <div class="card-body">

            <table class="table table-hover">

                <thead>

                    <tr>
                        <th>Nama Pasien</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($latestKunjungan as $k)

                    <tr>

                        <td>{{ $k->pasien->nama ?? '-' }}</td>

                        <td>{{ $k->tanggal_kunjungan }}</td>

                        <td>{{ $k->jenis_pemeriksaan ?? '-' }}</td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('chartKunjungan');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: @json($labels),

        datasets: [{

            label: 'Kunjungan',

            data: @json($grafik),

            borderColor: '#bb67b5',

            backgroundColor: 'rgba(187,103,181,0.2)',

            borderWidth: 3,

            fill: true,

            tension: 0.4

        }]
    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                labels: {
                    color: '#7a3d76'
                }
            }

        }

    }

});

</script>

@endsection