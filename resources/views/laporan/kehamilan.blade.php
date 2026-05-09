@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">
        Laporan Kehamilan
    </h3>

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Pasien</th>
                        <th>Tanggal</th>
                        <th>Usia Kehamilan</th>
                        <th>TFU</th>
                        <th>DJJ</th>
                        <th>Posisi Janin</th>

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
                            {{ $d->kehamilan->usia_kehamilan ?? '-' }}
                        </td>

                        <td>
                            {{ $d->kehamilan->tfu ?? '-' }}
                        </td>

                        <td>
                            {{ $d->kehamilan->djj ?? '-' }}
                        </td>

                        <td>
                            {{ $d->kehamilan->posisi_janin ?? '-' }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection