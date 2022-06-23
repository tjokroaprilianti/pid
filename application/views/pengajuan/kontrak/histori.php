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
					<h6 class="m-0 font-weight-bold"><a href="<?= base_url('pengajuan/kontrak') ?>" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Kode Pengajuan</th>
									<th>Nama Pengaju</th>
									<th>Waktu Submit</th>
									<th>Waktu Akhir Submit</th>
									<th>Status</th>
									<th>Penerima</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($histori as $h) : ?>
									<tr>
										<td><?= $h->kode_pengajuan ?></td>
										<td><?= $h->nama_user ?></td>
										<td><?= $h->waktu_awal_submit ?></td>
										<td><?= $h->waktu_akhir_submit == null ? '<span class="text-gray-500">Tidak ada data</span>' : $h->waktu_akhir_submit ?></td>
										<td><?= $h->status_histori ?></td>
										<td><?= $h->nama_jabatan ?></td>
									</tr>
								<?php endforeach ?>
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