<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pasien</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .line {
            border-top: 2px solid black;
            margin: 10px 0 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            background: #f2f2f2;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>Praktik Mandiri Bidan</h2>
    <h3>Fithriana Syaibatun, S.Keb., Bdn.</h3>
    <p>Jl. Letda Lukito No.12, Jatriroke Rt01/Rw04</p>
</div>

<div class="line"></div>

<h3>Data Pasien</h3>
<table>
    <tr>
        <th>Nama</th>
        <td>{{ $pasien->nama }}</td>
    </tr>
</table>

<h3>Riwayat Rekam Medis</h3>

<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Tekanan Darah</th>
            <th>Suhu</th>
            <th>Berat</th>
            <th>Diagnosis</th>
            <th>Keluhan</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasien->kunjungans->sortByDesc('tanggal_kunjungan') as $k)
            @if($k->rekamMedis)
            <tr>
                <td>{{ $k->tanggal_kunjungan }}</td>
                <td>{{ $k->jenis_pemeriksaan ?? '-' }}</td>
                <td>{{ $k->rekamMedis->tekanan_darah }}</td>
                <td>{{ $k->rekamMedis->suhu }}</td>
                <td>{{ $k->rekamMedis->berat_badan }}</td>
                <td>{{ $k->rekamMedis->diagnosis }}</td>
                <td>{{ $k->rekamMedis->catatan }}</td>
                <td>
                    {{-- KEHAMILAN --}}
                    @if($k->rekamMedis->kehamilan)
                        Usia: {{ $k->rekamMedis->kehamilan->usia_kehamilan }} minggu,
                        TFU: {{ $k->rekamMedis->kehamilan->tfu }},
                        DJJ: {{ $k->rekamMedis->kehamilan->djj }},
                        Posisi: {{ $k->rekamMedis->kehamilan->posisi_janin }}
                    @endif

                    {{-- KB --}}
                    @if($k->rekamMedis->kb)
                        Jenis: {{ $k->rekamMedis->kb->jenis_kb }},
                        Efek: {{ $k->rekamMedis->kb->efek_samping }},
                        Jadwal: {{ $k->rekamMedis->kb->jadwal_berikutnya }}
                    @endif

                    {{-- IMUNISASI --}}
                    @if($k->rekamMedis->imunisasi)
                        Jenis: {{ $k->rekamMedis->imunisasi->jenis_imunisasi }},
                        Jadwal: {{ $k->rekamMedis->imunisasi->jadwal_berikutnya }}
                    @endif

                    {{-- PERSALINAN --}}
                    @if($k->rekamMedis->persalinan)
                        BB: {{ $k->rekamMedis->persalinan->berat_bayi }},
                        TB: {{ $k->rekamMedis->persalinan->tinggi_bayi }},
                        APGAR: {{ $k->rekamMedis->persalinan->apgar }}
                    @endif
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>

</body>
</html>