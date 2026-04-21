@extends('layouts.app')

@section('content')

<section class="content">
<div class="container-fluid">

    <h1 class="mb-3">Tambah Kunjungan</h1>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Kunjungan</h3>
        </div>

        <form action="/kunjungans" method="POST">
            @csrf

            <div class="card-body">

                <!-- PASIEN -->
                <div class="form-group mb-3">
                    <label>Pasien</label>
                    <select name="pasien_id" class="form-control select2">
                        <option value="">-- Pilih Pasien --</option>
                         @foreach($pasiens as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                    <script>
                        $(document).ready(function() {
                        $('.select2').select2({
                            placeholder: "Cari pasien...",
                            allowClear: true
                        });
                        });
                    </script>
                </div>

                <!-- TANGGAL -->
                <div class="form-group mb-3">
                    <label>Tanggal Kunjungan</label>
                    <input type="date" name="tanggal_kunjungan" class="form-control" required>
                </div>

                <!-- JENIS -->
                <div class="form-group mb-3">
                    <label>Jenis Pemeriksaan</label>
                    <select name="jenis_pemeriksaan" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="kehamilan">Kehamilan</option>
                        <option value="persalinan">Persalinan</option>
                        <option value="imunisasi">Imunisasi</option>
                        <option value="kb">KB</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success">Simpan</button>
                <a href="/pasiens" class="btn btn-secondary">Kembali</a>
            </div>

        </form>

    </div>

</div>
</section>

@endsection