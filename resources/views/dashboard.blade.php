@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">Dashboard </h3>

    <!-- SUMMARY -->
    <div class="row">

        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalPasien }}</h3>
                    <p>Total Pasien</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $kunjunganHariIni }}</h3>
                    <p>Kunjungan Hari Ini</p>
                </div>
                <div class="icon"><i class="fas fa-notes-medical"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalRekamMedis }}</h3>
                    <p>Total Rekam Medis</p>
                </div>
                <div class="icon"><i class="fas fa-file-medical"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $jadwalHariIni }}</h3>
                    <p>Jadwal Hari Ini</p>
                </div>
                <div class="icon"><i class="fas fa-calendar"></i></div>
            </div>
        </div>

    </div>

    <!-- GRAFIK -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Grafik Kunjungan 7 Hari Terakhir</h3>
        </div>
        <div class="card-body">
            <canvas id="chartKunjungan"></canvas>
        </div>
    </div>

    <!-- KUNJUNGAN TERBARU -->
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Kunjungan Terbaru</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
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
                        <td>{{ $k->pasien->nama }}</td>
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
        labels: ['-6', '-5', '-4', '-3', '-2', '-1', 'Hari Ini'],
        datasets: [{
            label: 'Jumlah Kunjungan',
            data: @json($grafik),
            fill: false,
            tension: 0.3
        }]
    }
});
</script>

@endsection