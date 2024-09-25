@extends('admin.admin')

@section('content')
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        @if(isset($pengumuman) && isset($editMode))
                            Edit Pengumuman
                        @elseif(isset($createMode))
                            Tambah Pengumuman
                        @else
                            Pengumuman
                        @endif
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Success message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(isset($pengumuman) && isset($editMode))
                        <!-- Edit Pengumuman Form -->
                        <form action="{{ route('admin-pengumuman.update', $pengumuman->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="link_sheet">Link Sheet</label>
                                <input type="text" class="form-control" id="link_sheet" name="link_sheet" value="{{ $pengumuman->link_sheet }}" required>
                            </div>

                            <div class="form-group">
                                <label for="detail">Detail</label>
                                <textarea class="form-control" id="detail" name="detail" rows="4" required>{{ $pengumuman->detail }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pengumuman->tanggal }}" required>
                            </div>
                            <div class="form-group">
        <label for="no_wa">No WA</label>
        <input type="text" class="form-control" id="no_wa" name="no_wa" value="{{ $pengumuman->no_wa }}" required>
    </div>

                            <button type="submit" class="btn btn-primary">Update Pengumuman</button>
                        </form>
                    @elseif(isset($createMode))
                        <!-- Tambah Pengumuman Form -->
                        <form action="{{ route('admin-pengumuman.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="link_sheet">Link Sheet</label>
                                <input type="text" class="form-control" id="link_sheet" name="link_sheet" required>
                            </div>

                            <div class="form-group">
                                <label for="detail">Detail</label>
                                <textarea class="form-control" id="detail" name="detail" rows="4" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="form-group">
        <label for="no_wa">No WA</label>
        <input type="text" class="form-control" id="no_wa" name="no_wa" required>
    </div>
                            
                            <button type="submit" class="btn btn-primary">Tambah Pengumuman</button>
                        </form>
                    @else
                        <!-- Tabel Pengumuman -->
                        <table id="table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Link Sheet</th>
            <th>Detail</th>
            <th>Tanggal</th>
            <th>No WA</th> <!-- New column for WhatsApp number -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengumuman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->link_sheet }}</td>
                <td>{{ $item->detail }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->no_wa }}</td> <!-- Display WhatsApp number -->
                <td>
    <div class="d-flex">
        <a href="{{ route('admin-pengumuman.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
        <form action="{{ route('admin-pengumuman.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengumuman ini?')">Hapus</button>
        </form>
    </div>
</td>
            </tr>
        @endforeach
    </tbody>
</table>

                        <!-- Tambah Pengumuman button -->
                        <div class="text-center mt-4">
                            <a href="{{ route('admin-pengumuman.create') }}" class="btn btn-primary">Tambah Pengumuman</a>
                        </div>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->

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
