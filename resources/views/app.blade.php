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

            border-bottom: 1px solid #f5e3dd;

            box-shadow: 0 3px 12px rgba(0,0,0,0.04);
        }

        .navbar-brand{

            color: #7b5b8e !important;

            font-weight: 700;

            font-size: 20px;

            display: flex;
            align-items: center;
        }

        /* SIDEBAR */
        .main-sidebar{

            background:
            linear-gradient(
                180deg,
                #fff7f3,
                #fffdfc
            ) !important;

            border-right: 1px solid #f5e3dd;
        }

        /* BRAND */
        .brand-link{

            border-bottom: 1px solid #f5e3dd;

            padding-top: 20px;
            padding-bottom: 18px;

            background:
            linear-gradient(
                180deg,
                rgba(255,240,245,0.8),
                rgba(255,255,255,0)
            );
        }

        .brand-text{

            color: #7b5b8e !important;

            font-weight: 700;

            font-size: 18px;
        }

        /* LOGO */
        .logo-circle{

            width: 82px;
            height: 82px;

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
            0 10px 25px rgba(245,166,19,0.12);

            border: 3px solid white;
        }

        /* MENU */
        .sidebar .nav-link{

            color: #8b718f !important;

            border-radius: 16px;

            margin: 8px 14px;

            padding: 13px 15px;

            font-weight: 500;

            transition: 0.25s;
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
                #df9dd7
            ) !important;

            color: white !important;

            box-shadow:
            0 5px 15px rgba(187,103,181,0.2);
        }

        .sidebar .nav-icon{
            margin-right: 10px;
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

    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <span class="navbar-brand">

            <img src="{{ asset('asset/icon.png') }}"
                 alt="Logo"
                 style="
                    width:35px;
                    height:35px;
                    object-fit:contain;
                    margin-right:10px;
                 ">

            Sistem Bidan

        </span>

    </nav>

    <!-- SIDEBAR -->
    <aside class="main-sidebar elevation-4">

        <!-- BRAND -->
        <a href="/dashboard"
           class="brand-link text-center">

            <div class="logo-circle">

                <img src="{{ asset('asset/logo.png') }}"
                     alt="Logo"
                     style="
                        width:58px;
                        height:58px;
                        object-fit:contain;
                     ">

            </div>

            <span class="brand-text">
                Bidan Fithriana
            </span>

            <div style="
                font-size:12px;
                color:#c7a1b9;
                margin-top:4px;
            ">
                Kesehatan Ibu & Anak
            </div>

        </a>

        <!-- SIDEBAR -->
        <div class="sidebar">

            <nav class="mt-3">

                <ul class="nav nav-pills nav-sidebar flex-column">

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

                            <i class="nav-icon fas fa-users"></i>

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

                        <a href="/obats"
                           class="nav-link {{ request()->is('obats*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-capsules"></i>

                            <p>Data Obat</p>

                        </a>

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