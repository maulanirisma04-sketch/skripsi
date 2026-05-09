@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h3 style="color:#7b5b8e; font-weight:700;">
                Laporan Persalinan
            </h3>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal</th>
                        <th>Jenis Persalinan</th>
                        <th>Berat Bayi</th>
                        <th>Tinggi Bayi</th>
                        <th>APGAR</th>
                        <th>Anestesi</th>
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
                            {{ $d->persalinan->jenis_persalinan ?? '-' }}
                        </td>

                        <td>
                            {{ $d->persalinan->berat_bayi ?? '-' }}
                        </td>

                        <td>
                            {{ $d->persalinan->tinggi_bayi ?? '-' }}
                        </td>

                        <td>
                            {{ $d->persalinan->apgar ?? '-' }}
                        </td>

                        <td>
                            {{ $d->persalinan->anestesi ?? '-' }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection