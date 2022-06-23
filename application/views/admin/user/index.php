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
												<img src="<?= base_url('assets/img/avatar/') . $u->avatar_user ?>" class="rounded" height="60px" width="60px" alt="Avatar">
											</a>
										</td>
										<td><?= $u->nama_user ?></td>
										<td><?= $u->username_user ?></td>
										<td>
											<?php if ($u->id_user !== $user_login->id_user) : ?>
												<form action="<?= base_url('admin/user/ubah_status/') . $u->id_user ?>" method="POST" class="d-inline">
													<?php if ($u->status_user == 'On') : ?>
														<input type="hidden" name="status_user" value="Off">
														<button type="submit" class="btn btn-sm btn-success border-0" data-toggle="tooltip" data-placement="left" title="Ubah ke off">
															<i class="fas fa-check"></i>
														</button>
													<?php else : ?>
														<input type="hidden" name="status_user" value="On">
														<button type="submit" class="btn btn-sm btn-danger border-0" data-toggle="tooltip" data-placement="left" title="Ubah ke on">
															<i class="fas fa-times"></i>
														</button>
													<?php endif; ?>
												</form>
											<?php else : ?>
												<button type="submit" class="btn btn-sm btn-success border-0" data-toggle="tooltip" data-placement="left" title="Status tidak bisa diubah">
													<i class="fas fa-check"></i>
												</button>
											<?php endif; ?>
										</td>
										<td><?= ucfirst($u->nama_role) ?></td>
										<td>
											<a href="<?= base_url('admin/user/avatar/') . $u->id_user; ?>" class="btn btn-sm btn-primary mr-2" data-toggle="tooltip" data-placement="left" title="Ubah avatar"><i class="fas fa-image"></i></a>
											<a href="<?= base_url('admin/user/setting/') . $u->id_user; ?>" class="btn btn-sm btn-secondary mr-2" data-toggle="tooltip" data-placement="left" title="Setting"><i class="fas fa-cog"></i></a>
											<?php if ($u->id_user !== $user_login->id_user) : ?>
												<button type="button" class="btn btn-sm btn-warning mr-2" data-toggle="modal" data-target="#passwordUserModal<?= $u->id_user ?>"><span data-toggle="tooltip" data-placement="left" title="Ubah Password"><i class="fas fa-lock"></i></span></button>
											<?php endif; ?>
											<!-- <?php if ($user_login->role_id == 1) : ?> -->
											<!-- <a href="<?= base_url('admin/setting/role/user/hapus/') . $u->id_user; ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="fas fa-trash"></i></a> -->
											<!-- <?php endif; ?> -->
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

<!-- Modal Password User-->
<?php foreach ($user as $u) : ?>
	<div class="modal fade" id="passwordUserModal<?= $u->id_user ?>" tabindex="-1" aria-labelledby="passwordUserModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="passwordUserModalLabel">Ubah Password <?= $u->nama_user ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/user/ubah_password/') . $u->id_user ?>" method="POST">
						<div class="form-group form-row">
							<div class="col-lg-6">
								<label>Password</label> <small class="text-success">(Masukan password baru anda)</small>
								<input type="password" name="password_user" class="form-control <?= form_error('password_user') ? 'is-invalid' : '' ?>">
							</div>
							<div class="col-lg">
								<label>Konfirmasi Password</label>
								<input type="password" name="konfirmasi_password" class="form-control <?= form_error('konfirmasi_password') ? 'is-invalid' : '' ?>">
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