@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h3 style="color:#7b5b8e; font-weight:700;">
                Laporan Imunisasi
            </h3>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal</th>
                        <th>Jenis Imunisasi</th>
                        <th>Jadwal Berikutnya</th>
                        <th>Diagnosis</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($data as $d)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $d->kunjungan->pasien->nama ?? '-' }}
                        </td>

                        <td>
                            {{ $d->kunjungan->tanggal_kunjungan ?? '-' }}
                        </td>

                        <td>
                            {{ $d->imunisasi->jenis_imunisasi ?? '-' }}
                        </td>

                        <td>
                            {{ $d->imunisasi->jadwal_berikutnya ?? '-' }}
                        </td>

                        <td>
                            {{ $d->diagnosis ?? '-' }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection