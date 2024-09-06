<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alhusen | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('css/adminlte.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset ('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('plugins/sweetalert2/sweetalert2.css') }}">
  <!-- jQuery -->
  <script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>Al-</b>Husen</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan login</p>

      <form id='form'>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" id="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!--
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>-->
          <!-- /.col -->
          <div class="col-4">
            <button type="button" id="btnLogin" onclick="login()" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- Bootstrap 4 -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('js/adminlte.min.js') }}"></script>
<script src="{{ asset ('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">

  // Get the input field
  var input = document.getElementById("password");

  // Execute a function when the user presses a key on the keyboard
  input.addEventListener("keypress", function(event) {
    // If the user presses the "Enter" key on the keyboard
    if (event.key === "Enter") {
      // Cancel the default action, if needed
      event.preventDefault();
      // Trigger the button element with a click
      document.getElementById("btnLogin").click();
    }
  });

  function login()
    {
      const email = $("#email").val();
      const password = $("#password").val();      
      if(email.length == "") {

          Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Alamat Email Wajib Diisi !'
          });

      } else if(password.length == "") {

          Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
          });

      }else{
        $.ajax({
          type:'POST',
          url:"{{ route('admin-auth') }}",
          data: $('#form').serialize() + "&_token={{ csrf_token() }}",
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
                Swal.fire({
                icon: response.status_desc,
                title: "Sukses",
                text: 'Login berhasil',
                }).then (function() {
                  window.location.href = "{{ route('admin') }}";
                });
            }else{
              Swal.fire({
                icon: response.status_desc,
                title: "Gagal",
                text: 'Email atau password salah',
              })
            }   
          }
        });        
      }    
    }
</script>
</body>
</html>
