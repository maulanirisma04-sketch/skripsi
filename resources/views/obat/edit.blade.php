@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            <h3>Edit Data Obat</h3>

        </div>

        <div class="card-body">

            <form action="{{ route('obats.update', $obat->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nama Obat
                    </label>

                    <input type="text"
                           name="nama_obat"
                           class="form-control"
                           value="{{ $obat->nama_obat }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Satuan
                    </label>

                    <input type="text"
                           name="satuan"
                           class="form-control"
                           value="{{ $obat->satuan }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Stok
                    </label>

                    <input type="number"
                           name="stok"
                           class="form-control"
                           value="{{ $obat->stok }}"
                           required>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Update

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