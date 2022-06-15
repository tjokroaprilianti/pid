<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
	</div>

	<div class="row justify-content-center">
		<div class="col-lg">

			<!-- Avatar -->
			<div class="card shadow mb-4">
				<!-- Card Header - Accordion -->
				<a href="#collapseAvatar" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseAvatar">
					<h6 class="m-0 font-weight-bold text-primary">Avatar</h6>
				</a>
				<!-- Card Content - Collapse -->
				<div class="collapse show" id="collapseAvatar">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6">
								<img src="<?= base_url('assets/img/avatar/') . $user->avatar_user ?>" class="img-thumbnail rounded shadow" height="200px" width="200px" alt="avatar">
							</div>
							<div class="col-lg-6">
								<div class="float-right">
									<a href="<?= base_url('profile/hapus_avatar/') . $user->id_user ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
									<a href="<?= base_url('profile/avatar/') . $user->id_user ?>" class="btn btn-sm btn-primary"><i class="fas fa-image"></i> Edit</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Avatar -->

			<!-- Profile Setting -->
			<div class="card shadow mb-4">
				<!-- Card Header - Accordion -->
				<a href="#collapseProfile" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseProfile">
					<h6 class="m-0 font-weight-bold text-primary"><?= $title ?> Setting</h6>
				</a>
				<!-- Card Content - Collapse -->
				<div class="collapse show" id="collapseProfile">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-10">
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr>
												<td>Nama</td>
												<td><?= $user->nama_user ?></td>
											</tr>
											<tr>
												<td>Username</td>
												<td><?= $user->username_user ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-lg">
								<div class="float-right">
									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#settingProfileModal">
										<i class="fas fa-user"></i> Edit
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Avatar -->

			<!-- Password -->
			<div class="card shadow mb-4">
				<!-- Card Header - Accordion -->
				<a href="#collapsePassword" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapsePassword">
					<h6 class="m-0 font-weight-bold text-primary">Keamanan & Password</h6>
				</a>
				<!-- Card Content - Collapse -->
				<div class="collapse show" id="collapsePassword">
					<div class="card-body">
						<form action="<?= base_url('profile/reset_password/') . $user->id_user ?>" method="POST">
							<div class="row">
								<div class="col-lg">
									<div class="row justify-content-center">
										<div class="col-lg">
											<div class="form-group">
												<label>Password</label> <small class="text-success">(Masukan password baru anda)</small>
												<input type="password" name="password_user" class="form-control <?= form_error('password_user') ? 'is-invalid' : '' ?>">
											</div>
										</div>
										<div class="col-lg">
											<div class="form-group">
												<label>Konfirmasi Password</label>
												<input type="password" name="konfirmasi_password" class="form-control <?= form_error('konfirmasi_password') ? 'is-invalid' : '' ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="float-right">
										<button type="submit" class="btn btn-sm btn-primary mt-3"><i class="fas fa-paper-plane"></i> Edit Password</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Password -->
		</div>
	</div>
</div>

<!-- settingProfileModal -->
<div class="modal fade" id="settingProfileModal" tabindex="-1" aria-labelledby="settingProfileModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="settingProfileModalLabel">Setting <?= $user->nama_user; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('profile/setting/') . $user->id_user; ?>" method="POST">
					<div class="form-group">
						<label for="nama_user">Nama</label>
						<input type="text" name="nama_user" class="form-control" id="nama_user" value="<?=$user->nama_user;?>" autofocus>
					</div>
					<div class="form-group">
						<label for="username_user">Username</label>
						<input type="text" name="username_user" class="form-control" id="username_user" value="<?=$user->username_user;?>">
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
