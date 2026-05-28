<!DOCTYPE html>
<html>
<head>
    <title>No Antrian</title>

    <style>

        body{
            font-family: sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .ticket{
            width: 300px;
            background: white;
            border: 2px dashed #999;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1{
            font-size: 24px;
            margin-bottom: 15px;
            color: #444;
        }

        h2{
            font-size: 80px;
            margin: 10px 0;
            color: #bb67b5;
        }

        p{
            margin: 6px 0;
            font-size: 16px;
            color: #666;
        }

        .line{
            border-top: 1px dashed #bbb;
            margin: 15px 0;
        }

    </style>

</head>
<body>

    <div class="ticket">

        <h1>Nomor Antrian</h1>

        <div class="line"></div>

        <h2>{{ $kunjungan->nomor_antrian }}</h2>

        <div class="line"></div>

        <p>
            {{ $kunjungan->pasien->nama }}
        </p>

        <p>
            {{ $kunjungan->tanggal_kunjungan }}
        </p>

    </div>

</body>
</html>