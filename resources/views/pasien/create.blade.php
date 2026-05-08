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

    .form-control{
        border-radius: 10px;
        border: 1px solid #e5c9e3;
    }

    .form-control:focus{
        border-color: #bb67b5;
        box-shadow: 0 0 5px rgba(187,103,181,0.4);
    }

    textarea.form-control{
        min-height: 100px;
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

</style>

<section class="content">

<div class="container-fluid">

    <h2 class="mb-4 page-title">
        Tambah Pasien
    </h2>

    <div class="card card-custom">

        <div class="card-body">

            <form action="/pasiens" method="POST">

                @csrf

                <div class="form-group mb-3">

                    <label>Nama</label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           placeholder="Masukkan nama pasien"
                           required>

                </div>

                <div class="form-group mb-3">

                    <label>NIK</label>

                    <input type="text"
                           name="NIK"
                           class="form-control"
                           placeholder="Masukkan NIK">

                </div>

                <div class="form-group mb-3">

                    <label>Tanggal Lahir</label>

                    <input type="date"
                           name="tanggal_lahir"
                           class="form-control">

                </div>

                <div class="form-group mb-3">

                    <label>Alamat</label>

                    <textarea name="alamat"
                              class="form-control"
                              placeholder="Masukkan alamat pasien"></textarea>

                </div>

                <div class="form-group mb-4">

                    <label>No Telepon</label>

                    <input type="text"
                           name="no_telp"
                           class="form-control"
                           placeholder="Masukkan nomor telepon">

                </div>

                <button class="btn btn-save">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

                <a href="/pasiens" class="btn btn-secondary btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

</section>

@endsection