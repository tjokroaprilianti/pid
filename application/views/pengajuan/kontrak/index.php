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
				<?php if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Unit') : ?>
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold"><a href="<?= base_url('pengajuan/kontrak/tambah') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Kontrak</a></h6>
					</div>
				<?php endif ?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>Kode</th>
									<th>Cost Unit</th>
									<th>Cost Center</th>
									<th>Proyek Pengajuan</th>
									<th>Vendor Pengajuan</th>
									<th>Alamat Vendor</th>
									<th>VET Pajak</th>
									<th>DPP Pajak</th>
									<th>Tanggal Invoice</th>
									<th>Tanggal Akhir</th>
									<th>Tanggal Dibuat</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($pengajuan as $p) :
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $p->kode_pengajuan ?></td>
										<td><?= $p->nama_cost_unit ?></td>
										<td><?= $p->nama_cost_center ?></td>
										<td><?= $p->proyek_pengajuan ?></td>
										<td><?= $p->vendor_pengajuan ?></td>
										<td><?= $p->alamat_vendor_pengajuan ?></td>
										<td><?= $p->vet_pajak_pengajuan ?></td>
										<td><?= $p->dpp_pajak_pengajuan ?></td>
										<td><?= $p->tanggal_invoice_pengajuan ?></td>
										<td><?= $p->tanggal_invoice_akhir ?></td>
										<td><?= $p->created_at_pengajuan ?></td>
										<td>
											<a href="<?= base_url('pengajuan/kontrak/histori/') . $p->kode_pengajuan; ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="left" title="Histori"><i class="fas fa-history"></i></a>
										</td>
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