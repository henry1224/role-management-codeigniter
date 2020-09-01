<div class="shadow row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Inventori</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('welcome'); ?>">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Master</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Inventori</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            <?php if ($this->session->flashdata('password') == TRUE) : ?>
                <strong><?= $this->session->flashdata('password'); ?></strong>
            <?php endif; ?>
            <?php echo validation_errors('<div class="alert alert-danger shadow" role="alert"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>') ?>

            <div class="ibox shadow">
                <div class="ibox-title">
                    <a class="btn btn-outline btn-primary shadow" href="<?= base_url('inventori/browse') ?>">Kembali</a>
                </div>
                <div class="ibox-content">
                    <div class="container" id="pwd-containter1">
                        <form class="form-horizontalcenter" method="POST" action="">

                            <div class="col-md-6"><input type="hidden" name="id_inventori" value="<?= $inventori->id_inventori; ?>" class="form-control" autocomplete="off" autofocus></div>

                            <div class="form-group row"><label class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-md-8"><input type="text" name="kode_inventori" value="<?= $inventori->kode_inventori; ?>" class="form-control" autocomplete="off" autofocus>
                                    <small class="form-text text-danger"><?= form_error('kode_inventori'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-md-8"><input type="text" name="nama_inventori" value="<?= $inventori->nama_inventori; ?>" class="form-control" autocomplete="off" autofocus>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-8"><input type="text" name="type_inventori" value="<?= $inventori->type_inventori; ?>" class="form-control" autocomplete="off">
                                    <small class="form-text text-danger"><?= form_error('type_inventori'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label"> Brand</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="id_brand">
                                        <option value="">Pilih Brand....</option>
                                        <?php foreach ($brand as $tampil) { ?>
                                            <option value="<?php echo $tampil->id_brand; ?>" <?= $tampil->id_brand == $inventori->id_brand ? "selected" : null ?>><?php echo $tampil->nama_brand; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label">Pola</label>
                                <div class="col-sm-8"><input type="text" name="pola_inventori" value="<?= $inventori->pola_inventori; ?>" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label"> Segment</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="id_segment">
                                        <option value="">Pilih Segment....</option>
                                        <?php foreach ($segment as $tampil) { ?>
                                            <option value="<?php echo $tampil->id_segment; ?>" <?= $tampil->id_segment == $inventori->id_segment ? "selected" : null ?>><?php echo $tampil->nama_segment; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('id_segment'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label">Harga Beli</label>
                                <div class="col-md-8"><input type="number" name="harga_beli"  value="<?= $inventori->harga_beli; ?>"  class="form-control" autocomplete="off" autofocus></div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label">Harga Jual</label>
                                <div class="col-md-8"><input type="number" name="harga_jual"  value="<?= $inventori->harga_jual; ?>"  class="form-control" autocomplete="off" autofocus></div>
                            </div>

                            <button type="submit" name="tambah" value="simpan" class="btn btn-outline btn-primary">Tambah Data</button>
                            <div class="hr-line-dashed"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row"><label class="col-sm-1 col-form-label">By</label>
                                        <div class="col-md-8"><input type="text" name="create_by" value="<?= $inventori->create_by; ?>" class="form-control" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row"><label class="col-sm-1 col-form-label">Last</label>
                                        <div class="col-md-8"><input type="text" name="create_date"  value="<?= $inventori->create_date; ?>"  class="form-control" autocomplete="off" readonly></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>