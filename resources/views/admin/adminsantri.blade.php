@extends('admin.admin')
@section('content')
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Admin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
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
    <script src="{{ asset ('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
          //datatables
          const table = $('#table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,        
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "iDisplayLength": 50, //display length
             // "bFilter": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
              "url": "{{ route('admin-ajax-list')}}",
              "type": "POST",
              "dataType": "json",
              "data":{ _token: "{{csrf_token()}}"}
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
            //    "targets": [ -1 ], //last column
            //    "orderable": false, //set not orderable
            },
            ],
            "fnDrawCallback": function(nRow, aData, iDisplayIndex){
              $('#table tbody tr').hover(function() {
                $(this).addClass('highlight');
              }, function() {
                $(this).removeClass('highlight');
              });
            }

          });
        });

    </script>
@endsection
