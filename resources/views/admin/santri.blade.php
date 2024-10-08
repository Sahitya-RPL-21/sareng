@extends('admin.admin')
@section('content')
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset ('plugins/datatables/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset ('fonts/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset ('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Santri</h3><br />
        <button type="button" id="btnAdd" onclick="add()" class="btn btn-outline-success btn-sm"title="Add" onclick="add()">Add</button>        
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="table" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Handphone</th>
            <th>Email</th>
            <th>Alamat</th>

            <th style="width:100px;"></th>
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

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body form">
          <form action="#" id="form" class="form-horizontal">
            <div class="form-body">
             <div class="form-group">
                <label class="control-label col-md-3">Nama</label>
                <div class="col-md-8">
                <input type="hidden" name="id" class="form-control" id="id" >
                <input type="text" name="nama" class="form-control" id="nama" required="required">
                    <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Jenis Kelamin</label>
                <div class="col-md-8">
                  <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="jkl" name="jk" value="L">
                    <label class="form-check-label">Laki-laki</label>
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="jkp" name="jk" value="P">
                    <label class="form-check-label">Perempuan</label>
                  </div>
                  </div>
                  </div>
                  </div>                  
                 
                </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-md-3">Tempat Lahir</label>
                  <div class="col-md-8">
                    <input type="text" name="tempat" class="form-control" id="tempat" required="required">
                    <span class="help-block"></span>
                  </div>
              </div>              
              <div class="form-group">
                  <label class="control-label col-md-3">Tanggal Lahir</label>
                  <div class="col-md-8">
                    <div class="input-group date">
                    <input type="text" id="tgllahir" name="tgllahir" class="form-control datetimepicker-input">
                    <div class="input-group-append" data-target="#tgllahir">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                    <span class="help-block"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-md-3">Handphone</label>
                  <div class="col-md-8">
                    <input type="text" name="handphone" class="form-control" id="handphone" required="required">
                    <span class="help-block"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                      <input type="text" name="email" class="form-control" id="email" required="required">
                      <span class="help-block"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-md-3">Alamat</label>
                  <div class="col-md-8">
                  <textarea name="alamat" class="form-control" id="alamat" required="required"></textarea>
                      <span class="help-block"></span>
                  </div>
              </div>                                                 
                    
            </div>
          </form>
        </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script src="{{ asset ('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset ('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset ('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset ('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
  let save_method;//for save method string
  let table;
  //datepicker
  $('#tgllahir').datepicker({
    autoclose: true,
    format: "dd-mm-yyyy",
    todayHighlight: true,
    orientation: "top auto",
    todayBtn: true,
    todayHighlight: true,  
  });  

  $(function () {
    //datatables
    const today = '{{ date("d-m-Y") }}';
    table = $('#table').DataTable({
      "paging": true,
      dom: 'Bfrtip',
      buttons: [
        {
          extend:    'excelHtml5',
          text:      '<i class="fa fa-file-excel-o"></i>',
          titleAttr: 'Excel',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6] // the first column has an index of 0
          },
          title: 'Data Santri ' + today
        },
        ],
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
        "url": "{{ route('santri-ajax-list')}}",
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

function add()
{
  save_method = 'add';
  $('#form')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  $('#modal_form').modal('show'); // show bootstrap modal
  $('.modal-title').text('Add Data'); // Set Title to Bootstrap modal title
} 

function edit(id)
{
  let url = "{{route('santri-ajax-edit', ':id')}}";
  url = url.replace(':id', id);
  save_method = 'update';
  $('#form')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  // $('#typecot').attr('readonly', true);
  //Ajax Load data from ajax
  $.ajax({
    url : url,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('[name="id"]').val(data.id);
      $('[name="nama"]').val(data.nama);
      if (data.jk === 'L') {
        $("#jkl").prop("checked", true);
      }else if(data.jk === 'P') {
        $("#jkp").prop("checked", true);
      }      
      $('[name="tempat"]').val(data.tempat);
      $('[name="tgllahir"]').val(data.tgllahir);
      $('[name="handphone"]').val(data.handphone);
      $('[name="email"]').val(data.email);
      $('[name="alamat"]').val(data.alamat);
      $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text('Edit Data'); // Set title to Bootstrap modal title

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
  });
}

function reload_table()
{
  table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    let url;

    if(save_method == 'add') {
        url = "{{ route('santri-ajax-add')}}";
    } else {
        url = "{{ route('santri-ajax-update')}}";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize() + "&_token={{ csrf_token() }}",
        dataType: "JSON",
        success: function(response)
        {

            if(response.status === 200) //if success close modal and reload ajax table
            {
              $('#modal_form').modal('hide');
              Swal.fire({
                icon: response.status_desc,
                title: "Sukses",
                text: 'Berhasil disimpan',
              })
              reload_table();
            }else{
              Swal.fire({
                icon: response.status_desc,
                title: "Gagal",
                text: 'Silahkan coba lagi',
              })
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_by_id(id)
{
    let url = "{{route('santri-ajax-delete', ':id')}}";
    url = url.replace(':id', id);
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(response)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                if(response.status === 200) //if success close modal and reload ajax table
                {
                  $('#modal_form').modal('hide');
                  Swal.fire({
                    icon: response.status_desc,
                    title: "Sukses",
                    text: 'Berhasil dihapus',
                  })
                  reload_table();
                }else{
                  Swal.fire({
                    icon: response.status_desc,
                    title: "Gagal",
                    text: 'Silahkan coba lagi',
                  })
                }
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>

@endsection
