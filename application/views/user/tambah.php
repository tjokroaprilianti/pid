<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
		<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
	</div>

	<!-- Content Row -->
	<div class="row justify-content-center">
		<div class="col-lg-10 col-xl-8">
			<div class="card shadow mb-4 border-bottom-primary">
				<div class="card-header py-3">
					<div class="row">
						<div class="col-lg-8 my-auto">
							<h6 class="m-0 font-weight-bold text-grey-700"><i class="fas fa-plus"></i> Form <?= $title ?></h6>
						</div>
						<div class="col-lg">
							<h6 class="m-0 font-weight-bold"><a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= base_url('user/tambah') ?>" enctype="multipart/form-data">
						<div class="form-group form-row">
							<div class="col-lg-6 col-xl-6">
								<label for="nama_user">Nama <span class="text-danger">*</span></label>
								<input type="text" name="nama_user" class="form-control" value="<?= set_value('nama_user'); ?>" id="nama_user" autofocus>
								<?= form_error('nama_user', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-lg-6 col-xl-6">
								<label for="password_user">Password <span class="text-danger">*</span></label>
								<input type="password" name="password_user" class="form-control" id="password_user">
								<?= form_error('password_user', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group form-row">
							<div class="col-lg-6 col-xl-6">
								<label for="username_user">Username <span class="text-danger">*</span></label>
								<input type="text" name="username_user" class="form-control" value="<?= set_value('username_user'); ?>" id="username_user">
								<?= form_error('username_user', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-lg-6 col-xl-6">
								<label for="konfirmasi_password">Konfirmasi Password <span class="text-danger">*</span></label>
								<input type="password" name="konfirmasi_password" class="form-control" id="konfirmasi_password">
							</div>
						</div>
						<div class="form-group form-row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-6 col-xl-6 text-center">
										<img src="<?= base_url('assets/img/avatar/') ?>default.jpg" class="rounded" height="200px" width="200px" alt="Avatar">
									</div>
									<div class="col-lg-6 col-xl-6">
										<label for="avatar_user"><small><span class="text-danger">.jpg | .jpeg | .png | <span class="text-success">(optional | 2mb)</span></span></small></label>
										<div class="custom-file">
											<input type="file" name="avatar_user" class="custom-file-input" id="customFile">
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
										<?= form_error('avatar_user', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="col-lg">
								<label for="role">Role <span class="text-danger">*</span></label>
								<select name="role" class="form-control" id="role">
									<option value="" class="text-gray-500">- pilih role -</option>

									<option value="Admin">Admin</option>
									<option value="Unit">Unit</option>
									<option value="Manager">Manager</option>
									<option value="Accounting">Accounting</option>
									<option value="Pajak">Pajak</option>
									<option value="Pembayaran">Pembayaran</option>
									<option value="Anggaran">Anggaran</option>
									<option value="Manager Treasury">Manager Treasury</option>
									<option value="VP Of Corporate Finance">VP Of Corporate Finance</option>
								</select>
								<?= form_error('role', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-lg">
								<label for="unit_id">Unit <span class="text-danger">*</span></label>
								<select name="unit_id" class="form-control" id="unit_id">
									<option value="" class="text-gray-500">- pilih unit -</option>
									<?php foreach ($unit as $u) : ?>
										<option value="<?= $u->id_unit ?>"><?= ucfirst($u->nama_unit) ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('unit_id', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
						</div>
						<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->

</div>
<!-- /.container-fluid -->