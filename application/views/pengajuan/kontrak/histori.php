<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
		<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg">
			<div class="card shadow mb-4 border-bottom-primary">
				<div class="card-header py-3">
					<div class="row">
						<div class="col-lg-8 my-auto">
							<h6 class="m-0 font-weight-bold"><i class="fas fa-clipboard-list"></i> Detail Kontrak</h6>
						</div>
						<div class="col-lg">
							<h6 class="m-0 font-weight-bold"><a href="<?= base_url('pengajuan/kontrak') ?>" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg">
							<div class="table-responsive">
								<table class="table table-borderless table-hover table-sm" width="100%" cellspacing="0">
									<tbody>
										<tr>
											<td>Kode Pengajuan</td>
											<td>: <?= $pengajuan->kode_pengajuan ?></td>
										</tr>
										<tr>
											<td>Nama Pengaju</td>
											<td>: <?= $pengajuan->nama_user ?></td>
										</tr>
										<tr>
											<td>Nama Cost Center</td>
											<td>: <?= $pengajuan->nama_cost_center ?></td>
										</tr>
										<tr>
											<td>Nama Cost Unit</td>
											<td>: <?= $pengajuan->nama_cost_unit ?></td>
										</tr>
										<tr>
											<td>Tanggal Invoice Pengajuan</td>
											<td>: <?= $pengajuan->tanggal_invoice_pengajuan ?></td>
										</tr>
										<tr>
											<td>Proyek Pengajuan</td>
											<td>: <?= $pengajuan->proyek_pengajuan ?></td>
										</tr>
										<tr>
											<td>Vendor Pengajuan</td>
											<td>: <?= $pengajuan->vendor_pengajuan ?></td>
										</tr>
										<tr>
											<td>Alamat Vendor Pengajuan</td>
											<td>: <?= $pengajuan->alamat_vendor_pengajuan ?></td>
										</tr>
										<tr>
											<td>VET Pajak Pengajuan</td>
											<td>: <?= $pengajuan->vet_pajak_pengajuan ?></td>
										</tr>
										<tr>
											<td>DPP Pajak Pengajuan</td>
											<td>: <?= $pengajuan->dpp_pajak_pengajuan ?></td>
										</tr>
										<tr>
											<td>Waktu Submit Pengajuan</td>
											<td>: <?= $pengajuan->created_at_pengajuan ?></td>
										</tr>
										<?php if ($user_login->role != 'Unit') { ?>
											<?php if ($select_histori->diterima == 0) { ?>
												<?php if ($select_histori->penerima == $user_login->role) { ?>
													<tr>
														<td></td>
														<td>
															<button type="button" class="btn btn-sm btn-danger mr-2" data-toggle="modal" data-target="#StatusHistoriModal">
																<i class="fas fa-times"></i> Ditolak
															</button>
															<form action="<?= base_url('pengajuan/kontrak/menyetujui/') . $pengajuan->kode_pengajuan; ?>" method="POST" style="display: inline;">
																<input type="hidden" name="status_histori" value="DI PROSES">
																<button type="submit" class="btn btn-sm btn-success border-0">
																	<i class="fas fa-check"></i> Diterima
																</button>
															</form>
														</td>
													</tr>
												<?php } else { ?>
													<tr>
														<td></td>
														<td><span class="badge badge-success"><i class="fas fa-check"></i> Sudah Diterima</span></td>
													</tr>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-lg-2 p-5 my-auto text-center">
							<div class="row">
								<div class="col-lg">
									<i class="fas fa-file-pdf fa-8x text-danger"></i>
								</div>
							</div>
							<div class="row">
								<div class="col-lg">
									<a href="#" class="btn btn-sm btn-danger mt-2"><i class="fas fa-eye"></i> PDF</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->

	<!-- Histori -->
	<div class="card shadow mb-4 border-bottom-primary">
		<!-- Card Header - Accordion -->
		<a href="#collapseHistori" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseHistori">
			<h6 class="m-0 font-weight-bold text-gray-600"><i class="fas fa-history"></i> <?= $title ?></h6>
		</a>
		<!-- Card Content - Collapse -->
		<div class="collapse show" id="collapseHistori">
			<div class="card-body">
				<div class="row">
					<div class="col-lg">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kode</th>
										<th>Status</th>
										<th>Penerima</th>
										<th>Tanggal Dibuat</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($histori as $h) : ?>
										<tr>
											<td><?= $h->kode_pengajuan ?></td>

											<?php if ($h->status_histori == 'MENUNGGU') : ?>
												<td class="text-center"><small class="badge badge-warning"><?= $h->status_histori ?></small></td>
											<?php elseif ($h->status_histori == 'DI PROSES') : ?>
												<td class="text-center"><small class="badge badge-primary"><?= $h->status_histori ?></small></td>
											<?php elseif ($h->status_histori == 'SELESAI') : ?>
												<td class="text-center"><small class="badge badge-success"><?= $h->status_histori ?></small></td>
											<?php else : ?>
												<td class="text-center"><small class="badge badge-danger"><?= $h->status_histori ?></small></td>
											<?php endif; ?>
											<td><?= $h->penerima ?></td>

											<td><?= $h->created_at_histori ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Histori -->

</div>
<!-- /.container-fluid -->

<!-- Modal Status Histori-->
<div class="modal fade" id="StatusHistoriModal" tabindex="-1" aria-labelledby="StatusHistoriModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="StatusHistoriModalLabel">Ditolak</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST">
					<div class="form-group">
						<label for="alasan">Alasan</label>
						<textarea class="form-control" id="alasan" rows="3"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
				<button type="button" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Kirim</button>
			</div>
		</div>
	</div>
</div>