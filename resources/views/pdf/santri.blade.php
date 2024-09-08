<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pendaftaran Santri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
        .title h1 {
            margin: 0;
        }
        .info {
            margin-bottom: 20px;
        }
        .info label {
            font-weight: bold;
        }
        .info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Pendaftaran Santri</h1>
        </div>
        <div class="info">
            <label>Nama:</label>
            <p>{{ $santri->nama }}</p>
        </div>
        <div class="info">
            <label>Jenis Kelamin:</label>
            <p>{{ $santri->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
        </div>
        <div class="info">
            <label>Tempat Lahir:</label>
            <p>{{ $santri->tempat }}</p>
        </div>
        <div class="info">
            <label>Tanggal Lahir:</label>
            <p>{{ \Carbon\Carbon::parse($santri->tgllahir)->format('d-m-Y') }}</p>
        </div>
        <div class="info">
            <label>Handphone:</label>
            <p>{{ $santri->handphone }}</p>
        </div>
        <div class="info">
            <label>Email:</label>
            <p>{{ $santri->email }}</p>
        </div>
        <div class="info">
            <label>Alamat:</label>
            <p>{{ $santri->alamat }}</p>
        </div>
    </div>
</body>
</html>
