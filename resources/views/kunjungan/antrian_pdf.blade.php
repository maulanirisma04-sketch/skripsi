<!DOCTYPE html>
<html>
<head>
    <title>No Antrian</title>

    <style>

        body{
            font-family: sans-serif;
            text-align: center;
            padding-top: 80px;
        }

        h1{
            font-size: 60px;
            margin-bottom: 10px;
        }

        h2{
            font-size: 120px;
            margin: 0;
        }

    </style>

</head>
<body>

    <h1>Nomor Antrian</h1>

    <h2>{{ $kunjungan->nomor_antrian }}</h2>

    <p>
        {{ $kunjungan->pasien->nama }}
    </p>

    <p>
        {{ $kunjungan->tanggal_kunjungan }}
    </p>

</body>
</html>