@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h3>Tambah Data Obat</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('obats.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Nama Obat
                    </label>

                    <input type="text"
                           name="nama_obat"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Satuan
                    </label>

                    <input type="text"
                           name="satuan"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Stok
                    </label>

                    <input type="number"
                           name="stok"
                           class="form-control"
                           required>

                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('obats.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection