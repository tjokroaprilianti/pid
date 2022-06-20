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
					<h6 class="m-0 font-weight-bold"><a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah User</a></h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr class="text-center">
									<th>NO</th>
									<th>Avatar</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Status</th>
									<th>Role</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($user as $u) :
								?>
									<tr class="text-center">
										<td><?= $no++ ?></td>
										<td>
											<a href="<?= base_url('assets/img/avatar/') . $u->avatar_user ?>" target="_blank">
												<img src="<?= base_url('assets/img/avatar/') . $u->avatar_user ?>" class="rounded" height="30%" width="20%" alt="Avatar">
											</a>
										</td>
										<td><?= $u->nama_user ?></td>
										<td><?= $u->username_user ?></td>
										<td>
											<a href="#" class="badge <?= $u->status_user == 'On' ? 'badge-success' : 'badge-danger' ?>" data-toggle="modal" data-target="#statusUserModal<?= $u->id_user ?>">
												<?= $u->status_user ?>
											</a>
										</td>
										<td><?= $u->nama_role ?></td>
										<td>
											<a href="<?= base_url('admin/setting/role/user/ubah/') . $u->id_user; ?>" class="badge badge-success mr-2" data-toggle="tooltip" data-placement="left" title="Ubah"><i class="fas fa-edit"></i></a>
											<!-- <a href="<?= base_url('admin/setting/role/user/hapus/') . $u->id_user; ?>" class="badge badge-danger" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="fas fa-trash"></i></a> -->
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

<!-- Modal Status User-->
<div class="modal fade" id="statusUserModal<?= $u->id_user ?>" tabindex="-1" aria-labelledby="statusUserModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="statusUserModalLabel">Status User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>