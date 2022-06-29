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
							<h6 class="m-0 font-weight-bold"><a href="<?= base_url('master/cost/center') ?>" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= base_url('master/cost/center/tambah') ?>">
						<div class="form-group form-row">
							<div class="col-lg-6">
								<label for="kode_cost_center">Kode Cost Center <span class="text-danger">*</span></label>
								<input type="text" name="kode_cost_center" class="form-control" id="kode_cost_center" autofocus>
								<?= form_error('kode_cost_center', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-lg-6">
								<label for="nama_cost_center">Nama Cost Center <span class="text-danger">*</span></label>
								<input type="text" name="nama_cost_center" class="form-control" id="nama_cost_center">
								<?= form_error('nama_cost_center', '<small class="form-text text-danger">', '</small>'); ?>
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