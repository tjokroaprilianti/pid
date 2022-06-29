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
							<h6 class="m-0 font-weight-bold"><i class="fas fa-history"></i> Histori Pengajuan Kontrak</h6>
						</div>
						<div class="col-lg">
							<h6 class="m-0 font-weight-bold"><a href="<?= base_url('pengajuan/kontrak') ?>" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
						</div>
					</div>
				</div>
				<div class="card-body">
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
											<td class="text-center"><span class="badge badge-warning"><?= $h->status_histori ?></span></td>
										<?php elseif ($h->status_histori == 'DI PROSES') : ?>
											<td class="text-center"><span class="badge badge-primary"><?= $h->status_histori ?></span></td>
										<?php elseif ($h->status_histori == 'SELESAI') : ?>
											<td class="text-center"><span class="badge badge-success"><?= $h->status_histori ?></span></td>
										<?php else : ?>
											<td class="text-center"><span class="badge badge-danger"><?= $h->status_histori ?></span></td>
										<?php endif; ?>
										<td><?= $h->nama_user ?></td>
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
	<!-- Content Row -->

</div>
<!-- /.container-fluid -->