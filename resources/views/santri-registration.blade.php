@extends('main')
@section('content')
<link rel="stylesheet" href="{{ asset ('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

<style type="text/css">
    select {
			 border-style: none;
			 padding: 0 18px;
			 border-radius: 22px;
			 background-repeat: no-repeat;
			 background-position: 2px;
			 background-position-x: right;
			 background-size: 15px;
    }
</style>

<!-- about breadcrumb -->
<section class="w3l-breadcrumb">
	<div class="breadcrumb-bg breadcrumb-bg-about py-5">
		<div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
			<h2 class="title mt-5 pt-lg-5 pt-sm-3">Pendaftaran</h2>
			<ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-md-5">
				<li><a href="index.html">Santri</a></li>
				<li class="active">/ Registrasi</li>
			</ul>
		</div>
	</div>
	<div class="waveWrapper waveAnimation">
		<svg viewBox="0 0 500 150" preserveAspectRatio="none">
			<path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none;"></path>
		</svg>
	</div>
</section>
<!-- //about breadcrumb -->
<!-- contact block -->
<!-- contact1 -->
<section class="w3l-contact-1 pb-5" id="contact">
	<div class="contacts-9 py-lg-5 py-md-4">
		<div class="container">
			<div class="d-grid contact-view">
				<div class="cont-details">
					<h4 class="title-small"></h4>
					<h3 class="title-big mb-4"></h3>
					<p class="mb-sm-5 mb-4"></p>

					<div class="cont-top">
						<div class="cont-left text-center">
							<span class="fa fa-map-marker text-primary"></span>
						</div>
						<div class="cont-right">
							<h6>Alamat</h6>
							<p class="pr-lg-5">Blok Senin Maja Utara Kec. Maja Kab. Majalengka 45461</p>
						</div>
					</div>
					<div class="cont-top margin-up">
						<div class="cont-left text-center">
							<span class="fa fa-phone text-primary"></span>
						</div>
						<div class="cont-right">
							<h6>Telepon </h6>
							<p>0882-9224-2947</a></p>
						</div>
					</div>
					<div class="cont-top margin-up">
						<div class="cont-left text-center">
							<span class="fa fa-envelope-o text-primary"></span>
						</div>
						<div class="cont-right">
							<h6>Email</h6>
							<p><a href="mailto:coursing@mail.com" class="mail">ponpesalhusen@gmail.com</a></p>
						</div>
					</div>
				</div>
				<div class="map-content-9">
					<h5 class="mb-sm-4 mb-3">Formulir Pendaftaran</h5>
					<form id='form'>
						<div class="twice-two">
							<input type="text" class="form-control" name="nama" id="w3lName" placeholder="Nama Lengkap"
								required="">
							<select class="input-select" name="jk">
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>						
							<input type="text" class="form-control" name="tempat" id="w3lName" placeholder="Tempat"
								required="">
							<input type="text" class="form-control" name="tgllahir" id="tgllahir" placeholder="Tanggal Lahir"
								required="">
							<input type="text" class="form-control" name="handphone" id="w3lName" placeholder="Handphone"
								required="">
							<input type="email" class="form-control" name="email" id="w3lSender" placeholder="Email"
								required="">
						</div>       
						<textarea class="form-control" name="alamat" id="w3lMessage" placeholder="alamat"
							required="">
						</textarea>
						<button type="button" class="btn btn-primary btn-style mt-4" onclick="save()">Daftar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /contact1 -->
<div class="map-iframe">
	<iframe
		src=""
		width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen=""></iframe>
</div>

<script src="{{ asset ('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
  //datepicker
  $('#tgllahir').datepicker({
    autoclose: true,
    format: "dd-mm-yyyy",
    todayHighlight: true,
    orientation: "top auto",
    todayBtn: true,
    todayHighlight: true,  
  });

	function save()
		{
			$.ajax({
				type:'POST',
				url:"{{ route('santri-registration-store') }}",
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
							text: 'Pendaftaran berhasil',
						})
					$('#form')[0].reset(); // reset form on modals
					}else{
						Swal.fire({
							icon: response.status_desc,
							title: "Gagal",
							text: 'Silahkan coba lagi',
						})
					}		
				}
				});
		}
</script>
@endsection