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
				<!-- <div class="card-header py-3">
					<h6 class="m-0 font-weight-bold"><a href="<?= base_url('admin/akses/tambah') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Akses</a></h6>
				</div> -->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>Nama</th>
									<th>Akses</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($user as $u) :
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $u->nama_user ?></td>
										<td>
											
										</td>
										<td>
											<?php if ($this->session->userdata('username') == $u->username_user) : ?>
											<?php else : ?>
												<a href="<?= base_url('admin/akses/setting/') . $u->id_user; ?>" class="btn btn-sm btn-secondary mr-2" data-toggle="tooltip" data-placement="left" title="Setting"><i class="fas fa-cog"></i></a>
											<?php endif; ?>
											<!-- <a href="<?= base_url('admin/akses/hapus/') . $u->id_user; ?>" class="badge badge-danger" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="fas fa-trash"></i></a> -->
											<!-- <div class="btn-group dropleft">
												<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
													<i class="fas fa-list-ul"></i>
												</button>
												<div class="dropdown-menu">
													<a href="#" class="dropdown-item"> Edit</a>
													<a href="#" class="dropdown-item"> Hapus</a>
												</div>
											</div> -->
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

<!-- Modal Akses -->
<?php foreach ($user as $u) : ?>
	<div class="modal fade" id="aksesModal<?= $u->id_user ?>" tabindex="-1" aria-labelledby="aksesModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="aksesModalLabel">Setting Akses <?= $u->nama_user ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url('admin/akses/setting') ?>">
						<div class="form-group form-row">
							<div class="col-lg">
								<?php foreach ($list_akses as $la) : ?>
									<div class="custom-control custom-switch">
										<input type="checkbox" name="akses[]" value="<?= $la->nama_akses ?>" class="custom-control-input" id="customSwitchAkses<?= $la->id_akses ?>">
										<label class="custom-control-label" for="customSwitchAkses<?= $la->id_akses ?>"><?= ucfirst($la->nama_akses) ?></label>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
					<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>