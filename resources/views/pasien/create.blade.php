@extends('layouts.app')

@section('content')

<section class="content">
<div class="container-fluid">

    <h1>Tambah Pasien</h1>

    <div class="card">
        <div class="card-body">

            <form action="/pasiens" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="NIK" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" name="no_telp" class="form-control">
                </div>

                <button class="btn btn-success mt-3">Simpan</button>
                <a href="/pasiens" class="btn btn-secondary mt-3">Kembali</a>

            </form>

        </div>
    </div>

</div>
</section>

@endsection