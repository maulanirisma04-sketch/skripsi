<!DOCTYPE html>
<html>

<head>

    <title>Sistem Bidan</title>

    <!-- ADMIN LTE -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background: #fffaf8;
        }

        /* NAVBAR */
        .main-header{
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);

            border-bottom: 1px solid #f7e4dc;

            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
        }

        .navbar-brand-custom{
            color: #7b5b8e !important;
            font-size: 20px;
            font-weight: 700;
        }

        /* SIDEBAR */
        .main-sidebar{

            background: linear-gradient(
                180deg,
                #fff7f3 0%,
                #fffdfc 100%
            ) !important;

            border-right: 1px solid #f6e6dd;

            overflow-y: auto;
        }

        .sidebar{
            height: calc(100vh - 80px);
            overflow-y: auto;
        }

        /* BRAND */
        .brand-link{

            padding-top: 22px;
            padding-bottom: 18px;

            border-bottom: 1px solid #f8e8de;

            background:
            linear-gradient(
                180deg,
                rgba(255,240,244,0.9),
                rgba(255,255,255,0)
            );
        }

        .brand-text{
            color: #7b5b8e !important;
            font-size: 18px;
            font-weight: 700;
        }

        /* LOGO */
        .logo-circle{

            width: 85px;
            height: 85px;

            border-radius: 24px;

            background:
            linear-gradient(
                135deg,
                #fff0f5,
                #fff7dd
            );

            display: flex;
            align-items: center;
            justify-content: center;

            margin: auto;
            margin-bottom: 14px;

            box-shadow:
            0 10px 25px rgba(245,166,19,0.15);

            border: 3px solid white;

            position: relative;
        }

        /* efek baby soft */
        .logo-circle::after{

            content: "🍼";

            position: absolute;

            bottom: -8px;
            right: -5px;

            font-size: 20px;

            background: white;

            width: 35px;
            height: 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        /* MENU */
        .sidebar .nav-link{

            color: #8b718f !important;

            border-radius: 18px;

            margin: 8px 14px;

            padding: 13px 16px;

            font-weight: 500;

            transition: all 0.25s ease;
        }

        .sidebar .nav-link:hover{

            background:
            linear-gradient(
                135deg,
                #fff0ea,
                #fff6d9
            );

            color: #f5a613 !important;

            transform: translateX(3px);
        }

        .sidebar .nav-link.active{

            background:
            linear-gradient(
                135deg,
                #bb67b5,
                #e39ad0
            ) !important;

            color: white !important;

            box-shadow:
            0 6px 18px rgba(187,103,181,0.25);
        }

        .sidebar .nav-icon{
            margin-right: 10px;
        }

        /* DROPDOWN */
        .nav-treeview{
            padding-left: 10px;
        }

        .nav-treeview .nav-link{
            font-size: 14px;
            padding: 10px 14px;
        }

        /* CONTENT */
        .content-wrapper{

            background:
            linear-gradient(
                180deg,
                #fffaf8,
                #fffefd
            );
        }

        /* CARD GLOBAL */
        .card{

            border: none;

            border-radius: 22px;

            box-shadow:
            0 5px 20px rgba(0,0,0,0.04);

            overflow: hidden;
        }

        .card-header{

            background: white !important;

            border-bottom: 1px solid #f6ece7;
        }

        /* BUTTON */
        .btn-primary{

            background:
            linear-gradient(
                135deg,
                #bb67b5,
                #d989c7
            );

            border: none;

            border-radius: 12px;

            font-weight: 600;
        }

        .btn-primary:hover{
            opacity: 0.95;
        }

        /* LOGOUT */
        .btn-logout{

            background:
            linear-gradient(
                135deg,
                #f5a613,
                #ffd36f
            );

            border: none;

            color: white;

            border-radius: 14px;

            padding: 8px 16px;

            font-weight: 600;

            box-shadow:
            0 4px 10px rgba(245,166,19,0.2);
        }

        .btn-logout:hover{
            opacity: 0.92;
            color: white;
        }

        /* TABLE */
        .table{

            border-radius: 15px;
            overflow: hidden;
        }

        .table thead{

            background: #fff3ef;
            color: #7b5b8e;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar{
            width: 8px;
        }

        ::-webkit-scrollbar-thumb{
            background: #edcfe7;
            border-radius: 20px;
        }

    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-light">

        <!-- BRAND -->
        <span class="navbar-brand navbar-brand-custom d-flex align-items-center">

            <img src="{{ asset('asset/icon.png') }}"
                 alt="Logo"
                 style="
                    width:38px;
                    height:38px;
                    object-fit:contain;
                    margin-right:12px;
                 ">

            Sistem Bidan

        </span>

        <!-- RIGHT -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button type="submit"
                            class="btn btn-logout">

                        <i class="fas fa-sign-out-alt"></i>
                        Logout

                    </button>

                </form>

            </li>

        </ul>

    </nav>

    <!-- SIDEBAR -->
    <aside class="main-sidebar elevation-4">

        <!-- BRAND -->
        <a href="/dashboard"
           class="brand-link text-center">

            <div class="logo-circle">

                <img src="{{ asset('asset/logo.jpeg') }}"
                     alt="Logo"
                     style="
                        width:60px;
                        height:60px;
                        object-fit:contain;
                     ">

            </div>

            <span class="brand-text">
                Bidan Fithriana
            </span>

            <div style="
                font-size:12px;
                color:#c59eb7;
                margin-top:4px;
            ">
                Kesehatan Ibu & Anak
            </div>

        </a>

        <!-- SIDEBAR -->
        <div class="sidebar">

            <nav class="mt-3">

                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false">

                    <!-- DASHBOARD -->
                    <li class="nav-item">

                        <a href="/dashboard"
                           class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-house"></i>

                            <p>Dashboard</p>

                        </a>

                    </li>

                    <!-- PASIEN -->
                    <li class="nav-item">

                        <a href="/pasiens"
                           class="nav-link {{ request()->is('pasiens*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-user-group"></i>

                            <p>Data Pasien</p>

                        </a>

                    </li>

                    <!-- KUNJUNGAN -->
                    <li class="nav-item">

                        <a href="/kunjungans/create"
                           class="nav-link {{ request()->is('kunjungans*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-stethoscope"></i>

                            <p>Kunjungan</p>

                        </a>

                    </li>

                    <!-- OBAT -->
                    <li class="nav-item">

                        <a href="{{ route('obats.index') }}"
                           class="nav-link">

                            <i class="nav-icon fas fa-capsules"></i>

                            <p>Data Obat</p>

                        </a>

                    </li>

                    <!-- LAPORAN -->
                    <li class="nav-item has-treeview 
                        {{ request()->is('laporan*') ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link 
                           {{ request()->is('laporan*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-file-medical-alt"></i>

                            <p>
                                Laporan
                                <i class="right fas fa-angle-left"></i>
                            </p>

                        </a>

                        <ul class="nav nav-treeview">

                            <!-- SEMUA -->
                            <li class="nav-item">

                                <a href="/laporan"
                                   class="nav-link {{ request()->is('laporan') ? 'active' : '' }}">

                                    <i class="far fa-circle nav-icon"></i>

                                    <p>Semua Laporan</p>

                                </a>

                            </li>

                            <!-- KEHAMILAN -->
                            <li class="nav-item">

                                <a href="/laporan/kehamilan"
                                   class="nav-link {{ request()->is('laporan/kehamilan') ? 'active' : '' }}">

                                    <i class="fas fa-baby nav-icon"></i>

                                    <p>Laporan Kehamilan</p>

                                </a>

                            </li>

                            <!-- IMUNISASI -->
                            <li class="nav-item">

                                <a href="/laporan/imunisasi"
                                   class="nav-link {{ request()->is('laporan/imunisasi') ? 'active' : '' }}">

                                    <i class="fas fa-syringe nav-icon"></i>

                                    <p>Laporan Imunisasi</p>

                                </a>

                            </li>

                            <!-- KB -->
                            <li class="nav-item">

                                <a href="/laporan/kb"
                                   class="nav-link {{ request()->is('laporan/kb') ? 'active' : '' }}">

                                    <i class="fas fa-heart nav-icon"></i>

                                    <p>Laporan KB</p>

                                </a>

                            </li>

                            <!-- PERSALINAN -->
                            <li class="nav-item">

                                <a href="/laporan/persalinan"
                                   class="nav-link {{ request()->is('laporan/persalinan') ? 'active' : '' }}">

                                    <i class="fas fa-hospital-user nav-icon"></i>

                                    <p>Laporan Persalinan</p>

                                </a>

                            </li>

                        </ul>

                    </li>

                </ul>

            </nav>

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