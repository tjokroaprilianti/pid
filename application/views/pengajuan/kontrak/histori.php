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
					<h6 class="m-0 font-weight-bold"><a href="<?= base_url('pengajuan/kontrak/tambah') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Kontrak</a></h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Cost Unit</th>
									<th>Cost Center</th>
									<th>Proyek Pengajuan</th>
									<th>Vendor Pengajuan</th>
									<th>Alamat Vendor</th>
									<th>VET Pajak</th>
									<th>DPP Pajak</th>
									<th>Tanggal Invoice</th>
									<th>Tanggal Dibuat</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $pengajuan->nama_cost_unit ?></td>
									<td><?= $pengajuan->nama_cost_center ?></td>
									<td><?= $pengajuan->proyek_pengajuan ?></td>
									<td><?= $pengajuan->vendor_pengajuan ?></td>
									<td><?= $pengajuan->alamat_vendor_pengajuan ?></td>
									<td><?= $pengajuan->vet_pajak_pengajuan ?></td>
									<td><?= $pengajuan->dpp_pajak_pengajuan ?></td>
									<td><?= $pengajuan->tanggal_invoice_pengajuan ?></td>
									<td><?= $pengajuan->created_at_pengajuan ?></td>
								</tr>
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
