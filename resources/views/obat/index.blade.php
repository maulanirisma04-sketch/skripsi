@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Data Obat</h3>

    <a href="{{ route('obats.create') }}"
       class="btn btn-primary mb-3">

        Tambah Obat

    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach($obats as $obat)

            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->satuan }}</td>
                <td>{{ $obat->stok }}</td>

                <td>

                    <a href="{{ route('obats.edit', $obat->id) }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('obats.destroy', $obat->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection