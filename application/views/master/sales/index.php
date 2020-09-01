<div class="row wrapper border-bottom white-bg page-heading shadow">
    <div class="col-sm-4">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Master</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Sales</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            <?php echo validation_errors('<div class="alert alert-danger shadow" role="alert"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>') ?>

            <div class="ibox shadow">
                <div class="ibox-title"><a class="btn btn-outline btn-primary shadow" href="" data-toggle="modal" data-target="#addData">Tambah Data</a></div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover text-center dataTables ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>
                                        <i class="fa fa-cogs"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($sales as $tampil) : $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $tampil->kode_sales; ?></td>
                                        <td><?= $tampil->nama_sales; ?></td>
                                        <td><?= $tampil->keterangan_sales; ?></td>
                                        <td>
                                            <div class="btn-group shadow">
                                                <button data-toggle="dropdown" class="btn btn-info btn btn-outline dropdown-toggle ">Tindakan</button>
                                                <ul class="dropdown-menu shadow">
                                                    <li><a class="dropdown-item" href="#modalEdit<?= $tampil->id_sales ?>" data-toggle="modal" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                                    <li><a class="dropdown-item" href="<?= base_url('sales/delete/') . $tampil->id_sales  ?>" onclick="return confirm('Yakin menghapus data <?= $tampil->nama_sales; ?>  ?!');"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>

                                                </ul>
                                            </div>
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
</div>
<!-- ==================================  MODAL TAMBAH  ========================================= -->
<div class="modal fade shadow-lg" id="addData" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data sales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('sales') ?>" method="POST">
                <div class="modal-body">
                    <!-- isi tabel -->
                    <div class="form-group row"><label class="col-sm-2 col-form-label">kode </label>
                        <div class="col-sm-10"><input type="text" name="kode_sales" class="form-control" placeholder="Masukkan Kode sales..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Nama Sales</label>
                        <div class="col-sm-10"><input type="text" name="nama_sales" class="form-control" placeholder="Masukkan Nama sales..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Telepon </label>
                        <div class="col-sm-10"><input type="text" name="no_sales" class="form-control" placeholder="Masukkan Telepon sales..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Alamat </label>
                        <div class="col-sm-10"><textarea type="text" name="alamat_sales" class="form-control"></textarea></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10"><input type="text" name="keterangan_sales" class="form-control" autocomplete="off" autofocus></div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="modal-body">
                    <button type="submit" class="btn btn-outline btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary btn-outline" data-dismiss="modal">Kembali</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
<!-- ==================================  MODAL TAMBAH  ========================================= -->
<!-- ==================================  MODAL EDIT  ========================================= -->
<?php foreach ($sales as $tampil) : ?>

    <div id="modalEdit<?php echo $tampil->id_sales ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <form class="form-horizontal" method="post" action="<?php echo base_url('sales/edit') ?>">
                    <div class="modal-body">
                        <input name="id_sales" type="hidden" value="<?php echo $tampil->id_sales; ?>">

                        <div class="form-group row"><label class="col-sm-2 col-form-label">Kode </label>
                            <div class="col-sm-10"><input type="text" name="kode_sales" value="<?= $tampil->kode_sales; ?>" class="form-control" placeholder="Masukkan Kode sales..." autocomplete="off" autofocus></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Nama Sales </label>
                            <div class="col-sm-10"><input type="text" name="nama_sales" value="<?= $tampil->nama_sales; ?>" class="form-control" placeholder="Masukkan Kode sales..." autocomplete="off" autofocus></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Telepon </label>
                            <div class="col-sm-10"><input type="text" name="no_sales" value="<?= $tampil->no_sales ?>" class="form-control placeholder=" Masukkan Telepon sales..." autocomplete="off" autofocus></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Alamat </label>
                            <div class="col-sm-10"><textarea type="text" name="alamat_sales" class="form-control"><?= $tampil->alamat_sales ?></textarea></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10"><input type="text" name="keterangan_sales" value="<?= $tampil->keterangan_sales; ?>" class="form-control" placeholder="Masukkan Nama..." autocomplete="off" autofocus></div>
                        </div>
                    </div>
                    <div class="modal-body">
                        
                        <button type="submit" class="btn btn-primary btn-outline">Edit Data</button>
                        <button class="btn btn-secondary btn-outline" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <!-- </div> -->
                    <div class="hr-line-dashed"></div>
                        <div class="form-group row"><label class="col-sm-1 col-form-label">By</label>
                            <div class="col-md-5"><input type="text" name="create_by" value="<?= $tampil->create_by ?>" class="form-control" autocomplete="off" readonly></div>
                            <label class="col-sm-1 col-form-label">Last</label>
                            <div class="col-md-5"><input type="text" name="create_date" value="<?= $tampil->create_date ?>" class="form-control" autocomplete="off" readonly></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<!-- ==================================  MODAL EDIT  ========================================= -->