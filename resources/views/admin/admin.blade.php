<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tebu Ireng | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('plugins/sweetalert2/sweetalert2.css') }}">
  <!-- jQuery -->
  <script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin/sidebar');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('admin/footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset ('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('js/adminlte.min.js') }}"></script>
<script>
  function logout(){
    $.ajax({
      type:'GET',
      url:"{{ route('admin-logout') }}",
      statusCode: {
        500: function (response) {
          Swal.fire({
            icon: 'error',
            title: "Gagal",
            text: 'Silahkan coba lagi',
          })
        }
      },  
      success:function(response) {
        if (response.status === 200){
          console.log(response);
          Swal.fire({
          icon: response.status_desc,
          title: "Sukses",
          text: 'Logout berhasil',
          }).then (function() {
            window.location.href = "{{ route('admin-login') }}";
          });
        }  
      }
    });
  }
</script>
</body>
</html>
