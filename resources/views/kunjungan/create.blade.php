@extends('layouts.app')

@section('content')

<style>

    .page-title{
        color: #bb67b5;
        font-weight: bold;
    }

    .card-custom{
        border-radius: 18px;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .card-header-custom{
        background: linear-gradient(
            135deg,
            #bb67b5,
            #d991d4
        );
        color: white;
        border-top-left-radius: 18px;
        border-top-right-radius: 18px;
        padding: 18px;
    }

    .form-control{
        border-radius: 10px;
        border: 1px solid #e5c9e3;
    }

    .form-control:focus{
        border-color: #bb67b5;
        box-shadow: 0 0 5px rgba(187,103,181,0.4);
    }

    label{
        font-weight: 600;
        color: #7a3d76;
    }

    .btn-save{
        background-color: #bb67b5;
        border-color: #bb67b5;
        color: white;
        border-radius: 10px;
        padding: 8px 18px;
        font-weight: 600;
    }

    .btn-save:hover{
        background-color: #a956a3;
        border-color: #a956a3;
        color: white;
    }

    .btn-back{
        border-radius: 10px;
        padding: 8px 18px;
        font-weight: 600;
    }

    .antrian-box{
        background: #fdf4fc;
        border: 1px dashed #d991d4;
        border-radius: 12px;
        padding: 15px;
    }

</style>

<section class="content">

<div class="container-fluid">

    <h2 class="mb-4 page-title">
        Tambah Kunjungan
    </h2>

    <div class="card card-custom">

        <!-- HEADER -->
        <div class="card-header card-header-custom">

            <h5 class="mb-0">
                <i class="fas fa-notes-medical"></i>
                Form Kunjungan Pasien
            </h5>

        </div>

        <form action="/kunjungans" method="POST">

            @csrf

            <div class="card-body">

                <!-- PASIEN -->
                <div class="form-group mb-4">

                    <label>Pasien</label>

                    <select name="pasien_id"
                            class="form-control select2"
                            required>

                        <option value="">
                            -- Pilih Pasien --
                        </option>

                        @foreach($pasiens as $p)

                            <option value="{{ $p->id }}">
                                {{ $p->nama }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- TANGGAL -->
                <div class="form-group mb-4">

                    <label>Tanggal Kunjungan</label>

                    <input type="date"
                           name="tanggal_kunjungan"
                           class="form-control"
                           required>

                </div>

                <!-- NOMOR ANTRIAN -->
                <div class="form-group mb-4">

                    <label>Nomor Antrian</label>

                    <div class="antrian-box">

                        <input type="text"
                            class="form-control mb-2"
                            value="Otomatis dibuat setelah data disimpan"
                            readonly>

                        <small class="text-muted">
                            Nomor antrian akan dibuat otomatis berdasarkan urutan kunjungan pada hari tersebut.
                        </small>

                    </div>

                </div>

                <!-- JENIS -->
                <div class="form-group mb-4">

                    <label>Jenis Pemeriksaan</label>

                    <select name="jenis_pemeriksaan"
                            class="form-control">

                        <option value="">
                            Pemeriksaan Umum
                        </option>

                        <option value="kehamilan">
                            Kehamilan
                        </option>

                        <option value="persalinan">
                            Persalinan
                        </option>

                        <option value="imunisasi">
                            Imunisasi
                        </option>

                        <option value="kb">
                            KB
                        </option>

                    </select>

                </div>

            </div>

            <!-- FOOTER -->
            <div class="card-footer bg-white border-0 pb-4">

                <button class="btn btn-save">

                    <i class="fas fa-save"></i>
                    Simpan & Download Antrian

                </button>

                <a href="/pasiens"
                   class="btn btn-secondary btn-back">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

</section>

@endsection