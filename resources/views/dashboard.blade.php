@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">Dashboard</h3>

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

    <!-- STAT TAMBAHAN -->
    <div class="row mt-3">

        <div class="col-md-4">
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>{{ $statKehamilan }}</h3>
                    <p>Data Kehamilan</p>
                </div>
                <div class="icon"><i class="fas fa-baby"></i></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $statKb }}</h3>
                    <p>Data KB</p>
                </div>
                <div class="icon"><i class="fas fa-syringe"></i></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $statImunisasi }}</h3>
                    <p>Imunisasi</p>
                </div>
                <div class="icon"><i class="fas fa-shield-virus"></i></div>
            </div>
        </div>

    </div>

    <!-- GRAFIK -->
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Grafik Kunjungan 7 Hari Terakhir</h3>
        </div>
        <div class="card-body">
            <canvas id="chartKunjungan"></canvas>
        </div>
    </div>

    <!-- JADWAL -->
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Jadwal Hari Ini</h3>
        </div>
        <div class="card-body">

            @if($jadwalList->count() > 0)

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($jadwalList as $j)
                        <tr>
                            <td>{{ $j['nama'] ?? '-' }}</td>
                            <td>{{ $j['jenis'] ?? '-' }}</td>
                            <td>
                                @if($j['kunjungan_id'])
                                    <a href="{{ route('rekam-medis.create', $j['kunjungan_id']) }}" class="btn btn-primary btn-sm">
                                        Isi Rekam Medis
                                    </a>
                                @else
                                    <span class="text-muted">Tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            @else
                <p class="text-muted">Tidak ada jadwal hari ini</p>
            @endif

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
            borderWidth: 3,
            fill: true,
            tension: 0.4
        }]
    }
});
</script>

@endsection