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
					<h6 class="m-0 font-weight-bold"><a href="<?= base_url('admin/master/role/tambah') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Role</a></h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>Nama Role</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($list_role as $lr) :
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $lr->nama_role ?></td>
										<td>
											<a href="<?=base_url('admin/master/role/ubah/') . $lr->id_role;?>" class="btn btn-sm btn-success mr-2" data-toggle="tooltip" data-placement="left" title="Ubah"><i class="fas fa-edit"></i></a>
											<!-- <a href="<?=base_url('admin/master/role/hapus/') . $lr->id_role;?>" class="badge badge-danger" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="fas fa-trash"></i></a> -->
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
