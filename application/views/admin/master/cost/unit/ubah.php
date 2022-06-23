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
                            <h6 class="m-0 font-weight-bold text-grey-700"><i class="fas fa-plus"></i> Form <?= $title ?></h6>
                        </div>
                        <div class="col-lg">
                            <h6 class="m-0 font-weight-bold"><a href="<?= base_url('admin/master/cost/unit') ?>" class="btn btn-sm btn-secondary float-right"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('admin/master/cost/unit/proses_ubah/') . $data_cost_unit->id_cost_unit ?>">
                        <div class="form-group form-row">
                            <div class="col-lg-6">
                                <label for="kode_cost_unit">Kode Cost Unit <span class="text-danger">*</span></label>
                                <input type="text" name="kode_cost_unit" class="form-control" value="<?= $data_cost_unit->kode_cost_unit; ?>" id="kode_cost_unit" autofocus>
                                <?= form_error('kode_cost_unit', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-lg-6">
                                <label for="nama_cost_unit">Nama Cost Unit <span class="text-danger">*</span></label>
                                <input type="text" name="nama_cost_unit" class="form-control" value="<?= $data_cost_unit->nama_cost_unit; ?>" id="nama_cost_unit" autofocus>
                                <?= form_error('nama_cost_unit', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-paper-plane"></i> Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
<!-- /.container-fluid -->