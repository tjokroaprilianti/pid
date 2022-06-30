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
							</tbody>
						</table>
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
											<td>(<?= $h->role ?>) <?= $h->nama_user ?></td>

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

<!-- 
	<tr>
		<td>Status Pengajuan</td>
		<?php if ($h->status_histori == 'MENUNGGU') : ?>
			<td><span class="badge badge-warning"><?= $h->status_histori ?></span></td>
		<?php elseif ($h->status_histori == 'DI PROSES') : ?>
			<td><span class="badge badge-primary"><?= $h->status_histori ?></span></td>
		<?php elseif ($h->status_histori == 'SELESAI') : ?>
			<td><span class="badge badge-success"><?= $h->status_histori ?></span></td>
		<?php else : ?>
			<td><span class="badge badge-danger"><?= $h->status_histori ?></span></td>
		<?php endif; ?>
	</tr>
 -->