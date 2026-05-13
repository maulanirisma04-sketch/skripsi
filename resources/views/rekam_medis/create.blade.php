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

    .section-box{
        background: #faf5fb;
        border-left: 5px solid #bb67b5;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 20px;
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

    .info-readonly{
        background-color: #f8f0f7;
    }

</style>

<div class="container-fluid">

    <h2 class="mb-4 page-title">
        Isi Rekam Medis
    </h2>

    <div class="card card-custom">

        <div class="card-body">

            <form action="{{ route('rekam.store') }}" method="POST">

                @csrf

                <!-- HIDDEN -->
                <input type="hidden"
                       name="kunjungan_id"
                       value="{{ $kunjungan->id }}">

                <!-- INFO PASIEN -->
                <div class="section-box">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label>Nama Pasien</label>

                            <input type="text"
                                   class="form-control info-readonly"
                                   value="{{ optional($kunjungan->pasien)->nama }}"
                                   readonly>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Tanggal Kunjungan</label>

                            <input type="text"
                                   class="form-control info-readonly"
                                   value="{{ $kunjungan->tanggal_kunjungan }}"
                                   readonly>

                        </div>

                    </div>

                </div>

                <!-- DATA UMUM -->
                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label>Tekanan Darah</label>

                        <input type="text"
                               name="tekanan_darah"
                               class="form-control">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Suhu</label>

                        <input type="number"
                               step="0.1"
                               name="suhu"
                               class="form-control">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label>Berat Badan</label>

                        <input type="number"
                               step="0.1"
                               name="berat_badan"
                               class="form-control">

                    </div>

                </div>

                <div class="mb-3">

                    <label>Diagnosis</label>

                    <textarea name="diagnosis"
                              class="form-control"></textarea>

                </div>

                <div class="mb-4">

                    <label>Catatan</label>

                    <textarea name="catatan"
                              class="form-control"></textarea>

                </div>

                <div class="col-md-4 mb-3">

                    <label>Resep Obat</label>
                        <textarea name="resep_obat"
                              class="form-control"></textarea>
                    </div>

                <!-- KHUSUS KEHAMILAN -->
                @if($kunjungan->jenis_pemeriksaan == 'kehamilan')

                <div class="section-box">

                    <h5 class="mb-3 text-success">
                        <i class="fas fa-baby"></i>
                        Data Kehamilan
                    </h5>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label>Usia Kehamilan</label>

                            <input type="text"
                                   name="usia_kehamilan"
                                   class="form-control">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>TFU</label>

                            <input type="text"
                                   name="tfu"
                                   class="form-control">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>DJJ</label>

                            <input type="text"
                                   name="djj"
                                   class="form-control">

                        </div>

                    </div>

                </div>

                @endif

                <!-- IMUNISASI -->
                @if($kunjungan->jenis_pemeriksaan == 'imunisasi')

                <div class="section-box">

                    <h5 class="mb-3 text-primary">
                        <i class="fas fa-shield-virus"></i>
                        Data Imunisasi
                    </h5>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label>Jenis Imunisasi</label>

                            <input type="text"
                                   name="jenis_imunisasi"
                                   class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Jadwal Berikutnya</label>

                            <input type="date"
                                   name="jadwal_berikutnya"
                                   class="form-control">

                        </div>

                    </div>

                </div>

                @endif

                <!-- KB -->
                @if($kunjungan->jenis_pemeriksaan == 'kb')

                <div class="section-box">

                    <h5 class="mb-3 text-warning">
                        <i class="fas fa-syringe"></i>
                        Data KB
                    </h5>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label>Jenis KB</label>

                            <input type="text"
                                   name="jenis_kb"
                                   class="form-control">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>Efek Samping</label>

                            <input type="text"
                                   name="efek_samping"
                                   class="form-control">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>Jadwal Berikutnya</label>

                            <input type="date"
                                   name="jadwal_berikutnya"
                                   class="form-control">

                        </div>

                    </div>

                </div>

                @endif

                <!-- PERSALINAN -->
                @if($kunjungan->jenis_pemeriksaan == 'persalinan')

                <div class="section-box">

                    <h5 class="mb-3 text-danger">
                        <i class="fas fa-heartbeat"></i>
                        Data Persalinan
                    </h5>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label>Jenis Persalinan</label>

                            <input type="text"
                                   name="jenis_persalinan"
                                   class="form-control">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>Berat Bayi</label>

                            <input type="number"
                                   name="berat_bayi"
                                   class="form-control">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label>Tinggi Bayi</label>

                            <input type="number"
                                   name="tinggi_bayi"
                                   class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>APGAR</label>

                            <input type="text"
                                   name="apgar"
                                   class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Anestesi</label>

                            <input type="text"
                                   name="anestesi"
                                   class="form-control">

                        </div>

                    </div>

                </div>

                @endif

                <button type="submit"
                        class="btn btn-save">

                    <i class="fas fa-save"></i>
                    Simpan Rekam Medis

                </button>

            </form>

        </div>

    </div>

</div>

@endsection