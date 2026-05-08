@extends('layouts.app')

@section('content')

<style>

    .page-title{
        color: #bb67b5;
        font-weight: bold;
    }

    .btn-custom{
        background-color: #bb67b5;
        border-color: #bb67b5;
        color: white;
        border-radius: 10px;
        font-weight: 600;
    }

    .btn-custom:hover{
        background-color: #a956a3;
        border-color: #a956a3;
        color: white;
    }

    .card-custom{
        border-radius: 18px;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .table thead{
        background-color: #f3d9f1;
        color: #7a3d76;
    }

    .table{
        border-radius: 10px;
        overflow: hidden;
    }

    .form-control{
        border-radius: 10px;
        border: 1px solid #e5c9e3;
    }

    .form-control:focus{
        border-color: #bb67b5;
        box-shadow: 0 0 5px rgba(187,103,181,0.4);
    }

    .btn-info{
        background-color: #8ecae6;
        border: none;
        border-radius: 8px;
    }

    .btn-warning{
        background-color: #ffd166;
        border: none;
        border-radius: 8px;
        color: black;
    }

    .btn-danger{
        border-radius: 8px;
    }

</style>

<section class="content">

<div class="container-fluid">

    <h2 class="mb-4 page-title">
        Data Pasien
    </h2>

    <div class="d-flex justify-content-between mb-3">

        <a href="/pasiens/create" class="btn btn-custom">
            <i class="fas fa-user-plus"></i>
            Tambah Pasien
        </a>

    </div>

    <form method="GET" action="">
        <div class="mb-3">
            <input 
                type="text" 
                name="search" 
                class="form-control" 
                placeholder="Cari nama pasien..."
                value="{{ $search ?? '' }}"
            >
        </div>
    </form>

    <div class="card card-custom">

        <div class="card-body">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No Telp</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($pasiens as $pasien)

                    <tr>

                        <td>{{ $pasien->nama }}</td>

                        <td>{{ $pasien->NIK }}</td>

                        <td>{{ $pasien->no_telp }}</td>

                        <td>

                            <a href="/pasiens/{{ $pasien->id }}" 
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                                Detail
                            </a>

                            <a href="/pasiens/{{ $pasien->id }}/edit" 
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>

                            <form action="/pasiens/{{ $pasien->id }}" 
                                  method="POST" 
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</section>

@endsection