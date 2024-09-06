@extends('admin.admin')
@section('content')
<div class="row mb-2">
  <div class="col-sm-6">
    <h4 class="m-0">Dashboard</h4>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3 id="jumlah"></h3>

            <p>Santri Terdaftar</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('admin-santri') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
  const jumlahSantri = countRegistrasi();
  function countRegistrasi(){
    $.ajax({
      type:'GET',
      url:"{{ route('santri-hitung') }}",
      statusCode: {
        200: function (response) {
          $('#jumlah').text(response.data);
        }
      },
    });
  }
</script>
@endsection
