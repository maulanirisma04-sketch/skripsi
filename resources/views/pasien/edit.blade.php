@extends('layouts.app')

@section('content')

<section class="content">
<div class="container-fluid">

    <h1>Edit Pasien</h1>

    <div class="card">
        <div class="card-body">

            <form action="/pasiens/{{ $pasien->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ $pasien->nama }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="NIK" value="{{ $pasien->NIK }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control">{{ $pasien->alamat }}</textarea>
                </div>

                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" name="no_telp" value="{{ $pasien->no_telp }}" class="form-control">
                </div>

                <button class="btn btn-success mt-3">Update</button>

            </form>

        </div>
    </div>

</div>
</section>

@endsection