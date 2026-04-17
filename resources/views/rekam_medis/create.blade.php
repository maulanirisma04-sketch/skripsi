@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Form Rekam Medis</h3>

    <form action="{{ route('rekam.store') }}" method="POST">
        @csrf

        <input type="hidden" name="kunjungan_id" value="{{ $kunjungan->id }}">

        <div class="mb-3">
            <label>Tekanan Darah</label>
            <input type="text" name="tekanan_darah" class="form-control">
        </div>

        <div class="mb-3">
            <label>Suhu</label>
            <input type="text" name="suhu" class="form-control">
        </div>

        <div class="mb-3">
            <label>Berat Badan</label>
            <input type="text" name="berat_badan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Diagnosis</label>
            <input type="text" name="diagnosis" class="form-control">
        </div>

        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="catatan" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection