@extends('layouts.app')

@section('content')

<section class="content">

    <div class="container-fluid">

        <h1 class="mb-4">Dashboard</h1>

        <div class="row">

            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>10</h3>
                        <p>Pasien</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ \App\Models\RekamMedis::count() }}</h3>
                        <p>Rekam Medis</p>
                </div>
                    <div class="icon">
                     <i class="fas fa-notes-medical"></i>
                </div>
                </div>
            </div>

        </div>

    </div>

</section>

@endsection