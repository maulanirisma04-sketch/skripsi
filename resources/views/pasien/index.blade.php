@extends('layouts.app')

@section('content')

<section class="content">
<div class="container-fluid">

    <h1 class="mb-3">Data Pasien</h1>

    <a href="/pasiens/create" class="btn btn-primary mb-3">
        Tambah Pasien
    </a>
    <form method="GET" action="">
    <div class="mb-3">
        <input 
            type="text" 
            name="search" 
            class="form-control" 
            placeholder="Cari nama pasien..."
            value="{{ $search ?? '' }}"
        >
    </div>
    </form>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pasiens as $pasien)
                    <tr>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->NIK }}</td>
                        <td>{{ $pasien->no_telp }}</td>
                        <td>

                            <a href="/pasiens/{{ $pasien->id }}" class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="/pasiens/{{ $pasien->id }}/edit" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="/pasiens/{{ $pasien->id }}" method="POST" style="display:inline;">
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
    </div>

</div>
</section>

@endsection