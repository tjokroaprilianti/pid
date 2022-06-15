<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?> | PID</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/template/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/template/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-white">

	<?= $this->session->flashdata('message'); ?>

	<div class="container my-auto">

		<!-- Outer Row -->
		<div class="row justify-content-center my-5">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0">
					<div class="card-body p-0 my-5">
						<!-- Nested Row within Card Body -->
						<div class="row my-5">
							<div class="col-lg-6 d-none d-lg-block text-center my-auto">
								<img src="<?= base_url('assets/template/img/') ?>vector-bg-white.png" alt="image login" height="70%" width="90%">
							</div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Login PID</h1>
									</div>
									<form class="user" action="<?= base_url('login') ?>" method="POST">
										<div class="form-group">
											<input type="text" name="username_user" class="form-control form-control-user" id="username" placeholder="Username" value="<?= set_value('username_user'); ?>" autofocus>
											<?= form_error('username_user', '<small class="form-text text-danger">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="password" name="password_user" class="form-control form-control-user" id="password" placeholder="Password">
											<?= form_error('password_user', '<small class="form-text text-danger">', '</small>'); ?>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Login
										</button>
									</form>
									<div class="text-center mt-3">
										<a class="small" href="forgot-password.html">Lupa Password?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/template/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/template/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/template/') ?>js/sb-admin-2.min.js"></script>
	<script type="text/javascript">
		window.setTimeout(function() {
			$(".alert").fadeTo(800, 2).slideUp(800, function() {
				$(this).remove();
			});
		}, 3000);
	</script>

</body>

</html>
