<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png') }}">
        <title>Perak Car Rental</title>
		<!-- Google Font: Source Sans Pro -->
		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
		<!-- Toastr -->
		<link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
		 --}}
        <!-- Styles -->
		<link rel="stylesheet" href="{{ asset('adminlte/css/style.css') }}">
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Tempusdominus Bootstrap 4 -->
		<link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
		<!-- iCheck -->
		<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
		<!-- JQVMap -->
		<link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
		<!-- Own style -->
		<link rel="stylesheet" href="{{ asset('adminlte/layout.css') }}">
		<link rel="stylesheet" href="{{ asset('adminlte/style.css') }}">
		<!-- SweetAlert2 -->
		<link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
		@yield('styles')
    </head>
    <body class="sidebar-mini layout-fixed layout-navbar-fixed">
		<div class="wrapper">
			@include('_includes.navigation')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper pb-2">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-0">
							<div class="col-sm-6">
								@yield('button')
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->

				<!-- Main content -->
				<div class="content">
					<div class="container-fluid">
						@yield('content')
					</div><!-- /.container-fluid -->
				</div>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<!-- Main Footer -->
			<footer class="main-footer text-center">
				<!-- Default to the left -->
				<strong>Copyright &copy; {{date('Y')}} All rights reserved | Perak Car Rental | Powered By SpaceX</strong>
			</footer>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery --> 
		<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}} "></script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
		<!-- Overlay Scrollbars  -->
		<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}} "></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('adminlte/dist/js/adminlte.min.js')}} "></script>
		<!-- InputMask -->
		<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
		<script src="{{ asset('adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
		<!-- SweetAlert2 -->
		<script src="{{ asset('adminlte//plugins/sweetalert2/sweetalert2.min.js') }}"></script>

		<script>
			$(function() {
				@if (session('success'))
					Swal.fire({
						icon: 'success',
						title: '{{ session('success') }}',
						showConfirmButton: false,
						timer: 2000
					})
				@endif
				@if (session('error'))
					Swal.fire({
						icon: 'error',
						title: '{{ session('error') }}',
						showConfirmButton: false,
						timer: 2000
					})
				@endif
				
				$('form').submit(function(){
					$(this).unbind('submit');
					$(this).submit(function(){
						return false;
					});
				});
			});
		</script>
			
		@yield('scripts')
	</body>
</html>
