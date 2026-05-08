@extends('layouts.app')

@section('content')

<style>

    .dashboard-title{
        color: #bb67b5;
        font-weight: bold;
    }

    .summary-card{
        border-radius: 18px;
        color: white;
        padding: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .summary-card:hover{
        transform: translateY(-3px);
    }

    .summary-card h3{
        font-size: 32px;
        font-weight: bold;
    }

    .summary-card .icon{
        position: absolute;
        right: 20px;
        bottom: 15px;
        font-size: 55px;
        opacity: 0.2;
    }

    .bg-soft-purple{
        background: linear-gradient(135deg, #bb67b5, #d991d4);
    }

    .bg-soft-blue{
        background: linear-gradient(135deg, #7aa7ff, #9ec5ff);
    }

    .bg-soft-pink{
        background: linear-gradient(135deg, #ff9ecf, #ffc2df);
    }

    .bg-soft-green{
        background: linear-gradient(135deg, #71d7b7, #9ae7cf);
    }

    .bg-soft-orange{
        background: linear-gradient(135deg, #ffb36b, #ffd199);
    }

    .bg-soft-red{
        background: linear-gradient(135deg, #ff8d8d, #ffb3b3);
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

</style>

<div class="container-fluid">

    <h2 class="mb-4 dashboard-title">
        Dashboard
    </h2>

    <!-- SUMMARY -->
    <div class="row">

        <div class="col-md-3 mb-4">

            <div class="summary-card bg-soft-purple">

                <h3>{{ $totalPasien }}</h3>

                <p>Total Pasien</p>

                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="summary-card bg-soft-green">

                <h3>{{ $kunjunganHariIni }}</h3>

                <p>Kunjungan Hari Ini</p>

                <div class="icon">
                    <i class="fas fa-notes-medical"></i>
                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="summary-card bg-soft-orange">

                <h3>{{ $totalRekamMedis }}</h3>

                <p>Total Rekam Medis</p>

                <div class="icon">
                    <i class="fas fa-file-medical"></i>
                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="summary-card bg-soft-red">

                <h3>{{ $jadwalHariIni }}</h3>

                <p>Jadwal Hari Ini</p>

                <div class="icon">
                    <i class="fas fa-calendar"></i>
                </div>

            </div>

        </div>

    </div>

    <!-- STAT TAMBAHAN -->
    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="summary-card bg-soft-pink">

                <h3>{{ $statKehamilan }}</h3>

                <p>Data Kehamilan</p>

                <div class="icon">
                    <i class="fas fa-baby"></i>
                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="summary-card bg-soft-purple">

                <h3>{{ $statKb }}</h3>

                <p>Data KB</p>

                <div class="icon">
                    <i class="fas fa-syringe"></i>
                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="summary-card bg-soft-blue">

                <h3>{{ $statImunisasi }}</h3>

                <p>Imunisasi</p>

                <div class="icon">
                    <i class="fas fa-shield-virus"></i>
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
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($jadwalList as $j)

                        <tr>

                            <td>{{ $j['nama'] ?? '-' }}</td>

                            <td>{{ $j['jenis'] ?? '-' }}</td>

                            <td>

                                @if($j['kunjungan_id'])

                                    <a href="{{ route('rekam.create', $j['kunjungan_id']) }}"
                                       class="btn btn-custom btn-sm">

                                        <i class="fas fa-notes-medical"></i>
                                        Isi Rekam Medis

                                    </a>

                                @else

                                    <span class="text-muted">
                                        Tidak tersedia
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

                    <p>
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