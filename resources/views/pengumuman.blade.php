@extends('main')

@section('content')

<section class="w3l-clients py-5" id="clients" style="margin-top: 7rem;">
    <div class="container">
        <h1 class="title-big text-center mb-sm-5 mb-40">Pengumuman</h1>

        <!-- Tabel Pengumuman -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Link Sheet</th>
                    <th>Detail</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <!-- Pengumuman Tanggal Tes Santri -->
                <tr>
                    <td>1</td>
                    <td>Tanggal Tes Santri</td>
                    <td>Tes Santri untuk semester ini akan dilaksanakan pada tanggal 15 Oktober 2024.</td>
                    <td>15 Oktober 2024</td>
                </tr>
                <!-- Pengumuman Santri yang Diterima -->
                <tr>
                    <td>2</td>
                    <td>Santri Diterima</td>
                    <td>Selamat kepada santri yang diterima pada program semester ini. Daftar nama santri dapat dilihat di papan pengumuman sekolah.</td>
                    <td>10 September 2024</td>
                </tr>
                <!-- Tambahkan lebih banyak baris jika diperlukan -->
            </tbody>
        </table>
        
        <!-- Tombol Kembali ke Home -->
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2">Kembali ke Home</a>
        </div>
    </div>
</section>

@endsection
