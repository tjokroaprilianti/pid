<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-lg-8 my-auto">
                            <h6 class="m-0 font-weight-bold text-grey-700"><i class="fas fa-plus"></i> Form <?= $title . ' ' . $user->nama_user ?></h6>
                        </div>
                        <div class="col-lg">
                            <h6 class="m-0 font-weight-bold"><a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('user/proses_setting/') . $user->id_user ?>">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="nama_user">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $user->nama_user ?>" autofocus>
                                    <?= form_error('nama_user', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="username_user">Username <span class="text-danger">* <small>(Gunakan huruf kecil)</small></span></label>
                                    <input type="text" class="form-control" id="username_user" name="username_user" value="<?= $user->username_user ?>" autofocus>
                                    <?= form_error('username_user', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="role_id">Role <span class="text-danger">*</span></label>
                                    <select name="role_id" class="form-control" id="role_id">
                                        <option value="" class="text-gray-500">- pilih role -</option>
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r->id_role ?>" <?= $user->role_id == $r->id_role ? 'selected' : '' ?>><?= ucfirst($r->nama_role) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('role_id', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
<!-- /.container-fluid -->