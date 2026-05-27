<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rekam Medis</title>

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
            vertical-align: top;
        }

    </style>

</head>

<body>

    <!-- HEADER -->
    <div class="header">

        <h2>Praktik Mandiri Bidan</h2>

        <h3>Fithriana Syaibatun, S.Keb., Bdn.</h3>

        <p>
            Jl. Letda Lukito No.12, Jatriroke Rt01/Rw04
        </p>

    </div>

    <div class="line"></div>

    <h3>Laporan Rekam Medis</h3>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Nama Pasien</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Tekanan Darah</th>
                <th>Suhu</th>
                <th>Berat</th>
                <th>Diagnosis</th>
                <th>Keluhan</th>
                <th>Resep Obat</th>
                <th>Detail</th>

            </tr>

        </thead>

        <tbody>

            @foreach($data as $d)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $d->kunjungan->pasien->nama ?? '-' }}
                </td>

                <td>
                    {{ $d->kunjungan->tanggal_kunjungan ?? '-' }}
                </td>

                <td>
                    {{ $d->kunjungan->jenis_pemeriksaan ?? '-' }}
                </td>

                <td>
                    {{ $d->tekanan_darah ?? '-' }}
                </td>

                <td>
                    {{ $d->suhu ?? '-' }}
                </td>

                <td>
                    {{ $d->berat_badan ?? '-' }}
                </td>

                <td>
                    {{ $d->diagnosis ?? '-' }}
                </td>

                <td>
                    {{ $d->catatan ?? '-' }}
                </td>

                <td>
                    {{ $d->resep_obat ?? '-' }}
                </td>

                <td>

                    {{-- KEHAMILAN --}}
                    @if($d->kehamilan)

                        Usia:
                        {{ $d->kehamilan->usia_kehamilan }}
                        minggu,

                        TFU:
                        {{ $d->kehamilan->tfu }},

                        DJJ:
                        {{ $d->kehamilan->djj }},

                        Posisi:
                        {{ $d->kehamilan->posisi_janin }}

                    @endif

                    {{-- KB --}}
                    @if($d->kb)

                        Jenis:
                        {{ $d->kb->jenis_kb }},

                        Efek:
                        {{ $d->kb->efek_samping }},

                        Jadwal:
                        {{ $d->kb->jadwal_berikutnya }}

                    @endif

                    {{-- IMUNISASI --}}
                    @if($d->imunisasi)

                        Jenis:
                        {{ $d->imunisasi->jenis_imunisasi }},

                        Jadwal:
                        {{ $d->imunisasi->jadwal_berikutnya }}

                    @endif

                    {{-- PERSALINAN --}}
                    @if($d->persalinan)

                        BB:
                        {{ $d->persalinan->berat_bayi }},

                        TB:
                        {{ $d->persalinan->tinggi_bayi }},

                        APGAR:
                        {{ $d->persalinan->apgar }}

                    @endif

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>