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
							<h6 class="m-0 font-weight-bold text-grey-600"><i class="fas fa-plus"></i> Form <?= $title ?></h6>
						</div>
						<div class="col-lg">
							<h6 class="m-0 font-weight-bold"><a href="<?= base_url('pengajuan/kontrak') ?>" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= base_url('pengajuan/kontrak/tambah') ?>" enctype="multipart/form-data">
						<div class="form-group form-row">
							<div class="col-lg-6">
								<label for="cost_center">Cost Unit <span class="text-danger">*</span></label>
								<select name="cost_unit_id" class="form-control" id="cost_center">
									<option value="" class="text-gray-500">- choose cost unit -</option>
									<?php foreach ($cost_unit as $cu) : ?>
										<option value="<?= $cu->id_cost_unit ?>"><?= $cu->kode_cost_unit ?> | <?= $cu->nama_cost_unit ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('cost_center_id', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-lg">
								<label for="cost_center">Cost Center <span class="text-danger">*</span></label>
								<select name="cost_center_id" class="form-control" id="cost_center">
									<option value="">- choose cost center -</option>
									<?php foreach ($cost_center as $cc) : ?>
										<option value="<?= $cc->id_cost_center ?>"><?= $cc->kode_cost_center ?> | <?= $cc->nama_cost_center ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('cost_center_id', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group form-row">
							<div class="col-lg-6">
								<label>Tanggal Invoice Pengajuan <span class="text-danger">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
									</div>
									<input type="text" name="tanggal_invoice_pengajuan" id="datepicker" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#datepicker" autocomplete="off" placeholder="YYYY-MM-DD H:m:s" />
								</div>
								<?= form_error('tanggal_invoice_pengajuan', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-lg-6">
								<label>Tanggal Invoice Berakhir <span class="text-danger">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
									</div>
									<input type="text" name="tanggal_invoice_akhir" id="datepickerakhir" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#datepickerakhir" autocomplete="off" placeholder="YYYY-MM-DD H:m:s" />
								</div>
								<?= form_error('tanggal_invoice_akhir', '<small class="form-text text-danger">', '</small>'); ?>
							</div>

						</div>
						<div class="form-group form-row">
							<div class="col-lg-6">
								<label for="vendor_pengajuan">Vendor Pengajuan <span class="text-danger">*</span></label>
								<input type="text" name="vendor_pengajuan" class="form-control" id="vendor_pengajuan">
								<?= form_error('vendor_pengajuan', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-lg-6">
								<label for="proyek_pengajuan">Proyek Pengajuan <span class="text-danger">*</span></label>
								<textarea class="form-control" name="proyek_pengajuan" id="proyek_pengajuan" rows="3"></textarea>
								<?= form_error('proyek_pengajuan', '<small class="form-text text-danger">', '</small>'); ?>
							</div>

						</div>
						<div class="form-group form-row">
							<div class="col-lg-6">
								<label for="alamat_vendor_pengajuan">Alamat Vendor <span class="text-danger">*</span></label>
								<textarea class="form-control" name="alamat_vendor_pengajuan" id="alamat_vendor_pengajuan" rows="3"></textarea>
								<?= form_error('alamat_vendor_pengajuan', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-lg-6">
								<label for="vet_pajak_pengajuan">VET Pajak Pengajuan <span class="text-danger">*</span></label>
								<textarea class="form-control" name="vet_pajak_pengajuan" id="vet_pajak_pengajuan" rows="3"></textarea>
								<?= form_error('vet_pajak_pengajuan', '<small class="form-text text-danger">', '</small>'); ?>
							</div>

						</div>
						<div class="form-group form-row">
							<div class="col-lg-6">
								<label for="dpp_pajak_pengajuan">DPP Pajak Pengajuan <span class="text-danger">*</span></label>
								<textarea class="form-control" name="dpp_pajak_pengajuan" id="dpp_pajak_pengajuan" rows="3"></textarea>
								<?= form_error('dpp_pajak_pengajuan', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="col-lg-6">
								<label for="file_pengajuan">File Pengajuan<span class="text-danger">*</span></label>
								<input type="file" name="file_pengajuan" id="file_pengajuan">
							</div>
						</div>
						<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->

</div>
<!-- /.container-fluid -->