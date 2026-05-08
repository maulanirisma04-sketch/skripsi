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

    .btn-update{
        background-color: #bb67b5;
        border-color: #bb67b5;
        color: white;
        border-radius: 10px;
        padding: 8px 18px;
        font-weight: 600;
    }

    .btn-update:hover{
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
        Edit Pasien
    </h2>

    <div class="card card-custom">

        <div class="card-body">

            <form action="/pasiens/{{ $pasien->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group mb-3">

                    <label>Nama</label>

                    <input type="text"
                           name="nama"
                           value="{{ $pasien->nama }}"
                           class="form-control">

                </div>

                <div class="form-group mb-3">

                    <label>NIK</label>

                    <input type="text"
                           name="NIK"
                           value="{{ $pasien->NIK }}"
                           class="form-control">

                </div>

                <div class="form-group mb-3">

                    <label>Tanggal Lahir</label>

                    <input type="date"
                           name="tanggal_lahir"
                           value="{{ $pasien->tanggal_lahir }}"
                           class="form-control">

                </div>

                <div class="form-group mb-3">

                    <label>Alamat</label>

                    <textarea name="alamat"
                              class="form-control">{{ $pasien->alamat }}</textarea>

                </div>

                <div class="form-group mb-4">

                    <label>No Telepon</label>

                    <input type="text"
                           name="no_telp"
                           value="{{ $pasien->no_telp }}"
                           class="form-control">

                </div>

                <button class="btn btn-update">
                    <i class="fas fa-save"></i>
                    Update
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