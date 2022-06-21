<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
			<a href="<?= base_url('admin/user') ?>" class="btn btn-sm btn-danger float-right"><i class="fas fa-undo"></i> Kembali</a>
		</div>
		<div class="card-body">
			<form action="<?= base_url('admin/user/ubah_avatar/') . $user->id_user ?>" enctype="multipart/form-data" method="POST">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="form-group">
							<img src="<?= base_url('assets/img/avatar/') . $user->avatar_user ?>" class="img-thumbnail rounded shadow" height="200px" width="200px" alt="avatar">
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-6">
								<div class="form-group">
									<small><span class="text-danger">.jpg | .png | .jpeg | max 2 mb</span></samp>
										<div class="custom-file">
											<input type="file" name="avatar_user" class="custom-file-input" id="customFile">
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
