<div class="row wrapper border-bottom white-bg page-heading shadow">
    <div class="col-sm-4">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Master</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Customer</strong>
            </li>
        </ol>
    </div>
</div>
<div class=" wrapper wrapper-content animated fadeInRight">

    <div class="row ">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <a class="btn btn-outline btn-info shadow" href="<?= base_url('customer/browse') ?>">Browse</a>
                </div>
                <div class="ibox-content shadow">
                    <form class="form-horizontalcenter" method="POST">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Kode</label>
                                    <div class="col-md-6"><input type="text" name="kode_customer" class="form-control" autocomplete="off" autofocus></div>
                                    <small class="form-text text-danger"><strong><?= form_error('kode_customer'); ?></strong></small>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-md-6"><input type="text" name="nama_customer" class="form-control" autocomplete="off" autofocus></div>
                                    <small class="form-text text-danger"><strong><?= form_error('nama_customer'); ?></strong></small>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-md-6"><input type="text" name="alamat_customer" class="form-control" autocomplete="off" autofocus></div>
                                    <small class="form-text text-danger"><strong><?= form_error('alamat_customer'); ?></strong></small>
                                </div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">Sales</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="id_sales">
                                            <option value="">Pilih Sales ....</option>
                                            <?php foreach ($sales as $tampil) { ?>
                                                <option value="<?php echo $tampil->id_sales; ?>"><?php echo $tampil->nama_sales; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Kota</label>
                                    <div class="col-md-6"><input type="text" name="kota_customer" class="form-control" autocomplete="off" autofocus></div>
                                    <small class="form-text text-danger"><strong><?= form_error('kota_customer'); ?></strong></small>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-md-6"><input type="text" name="provinsi_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Negara</label>
                                    <div class="col-md-6"><input type="text" name="negara_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Nama NPWP</label>
                                    <div class="col-md-6"><input type="text" name="nama_npwp" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">NO. NPWP</label>
                                    <div class="col-md-6"><input type="text" name="no_npwp" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Tgl. Pengukuhan</label>
                                    <div class="col-md-6"><input type="date" name="pengukuhan_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Telepoon</label>
                                    <div class="col-md-6"><input type="text" name="telepon_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-md-6"><input type="email" name="email_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Fax</label>
                                    <div class="col-md-6"><input type="text" name="fax_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Contact Persone</label>
                                    <div class="col-md-6"><input type="text" name="cp_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Handphone</label>
                                    <div class="col-md-6"><input type="text" name="hp_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">No. Rekening</label>
                                    <div class="col-md-6"><input type="text" name="norek_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Bank</label>
                                    <div class="col-md-6"><input type="text" name="bank_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Atas nama</label>
                                    <div class="col-md-6"><input type="text" name="an_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-md-6"><input type="text" name="ket_customer" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="cs_status">
                                            <option value="">Select status ...</option>
                                            <option value="1">Active</option>
                                            <option value="2">Non - Active</option>
                                            <option value="3">Blacklist</option>
                                        </select>
                                    </div>
                                    <small class="form-text text-danger"><strong><?= form_error('cs_status'); ?><strong></small>
                                </div>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <button type="submit" name="tambah" class="btn btn-outline btn-primary shadow">Tambah Data</button>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-1 col-form-label">By</label>
                                    <div class="col-md-6"><input type="text" name="create_by" class="form-control" autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-1 col-form-label">Last</label>
                                    <div class="col-md-6"><input type="text" name="create_date" class="form-control" autocomplete="off" readonly></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>