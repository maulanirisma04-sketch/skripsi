@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3 style="color:#7b5b8e; font-weight:700;">
            Laporan KB
        </h3>

    </div>

 

    <!-- TABLE -->
    <div class="card">

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal</th>
                        <th>Jenis KB</th>
                        <th>Keluhan</th>
                        <th>Efek Samping</th>
                        <th>Jadwal Berikutnya</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $d)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $d->kunjungan->pasien->nama ?? '-' }}
                        </td>

                        <td>
                            {{ $d->kunjungan->tanggal_kunjungan ?? '-' }}
                        </td>

                        <td>
                            {{ $d->kb->jenis_kb ?? '-' }}
                        </td>

                        <td>
                            {{ $d->catatan ?? '-' }}
                        </td>

                        <td>
                            {{ $d->kb->efek_samping ?? '-' }}
                        </td>

                        <td>
                            {{ $d->kb->jadwal_berikutnya ?? '-' }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center">

                            Tidak ada data

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection