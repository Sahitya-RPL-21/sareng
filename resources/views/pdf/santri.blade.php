<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pendaftaran Santri</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            width: 100px;
            height: auto;
        }
        .header h1 {
            margin: 10px 0 0;
            font-size: 24px;
            color: #333;
        }
        .info {
            margin-bottom: 20px;
        }
        .info label {
            font-weight: bold;
            color: #555;
        }
        .info p {
            margin: 5px 0;
            font-size: 16px;
            color: #333;
            padding: 8px;
            background-color: #f0f8ff;
            border-radius: 5px;
        }
        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .announcement {
            margin-top: 30px;
            padding: 15px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            color: #721c24;
            text-align: center;
            font-size: 16px;
        }
        .announcement strong {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pondok Pesantren Tebuireng</h1>
        </div>

        <!-- Title Section -->
        <div class="title">
            Pendaftaran Santri Baru
        </div>

        <!-- Information Section -->
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
        <div class="info">
    <label>Tanggal Pendaftaran:</label>
    <p>{{ \Carbon\Carbon::parse($santri->created_at)->format('d-m-Y') }}</p>
</div>

        <!-- Announcement Section -->
        <div class="announcement">
            <strong>Pengumuman!</strong><br>
            Pengumuman mengenai jadwal tes dan hasil diterimanya santri dapat dilihat pada website ini di menu pengumuman  <br>
        </div>
    </div>
</body>
</html>
