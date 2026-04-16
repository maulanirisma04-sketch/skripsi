<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pengelolaan Pasien</title>

    <!-- AdminLTE CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <span class="navbar-brand">Bidan Fitriana Syaibatun</span>
        <form action="{{ route('logout') }}" method="POST" class="ml-auto">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm">
        Logout
    </button>
</form>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link text-center">
            <span class="brand-text">Praktik Bidan Mandiri</span>
        </a>

        <div class="sidebar">
            <nav>
                <ul class="nav nav-pills nav-sidebar flex-column">

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/pasiens" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kunjungans/create" class="nav-link">
                            <i class="nav-icon fas fa-notes-medical"></i>
                            <p>Kunjungan</p>
                        </a>
                    </li>

                </ul>
            </nav>
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
    </aside>

    <!-- CONTENT -->
    <div class="content-wrapper">
        <section class="content p-3">
            @yield('content')
        </section>
    </div>

</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>