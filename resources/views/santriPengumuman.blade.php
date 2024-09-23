@extends('main')

@section('content')

<section class="w3l-clients py-5" id="clients" style="margin-top: 7rem;">
    <div class="container">
        <h1 class="title-big text-center mb-sm-5 mb-40">Pengumuman</h1>

        <!-- Tabel Pengumuman -->
        <table id="table" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Link Sheet</th>
                    <th>Detail</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengumuman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ $item->link_sheet }}" target="_blank">{{ $item->link_sheet }}</a></td>
                        <td>{{ $item->detail }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        // DataTables
        const table = $('#table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@endsection
