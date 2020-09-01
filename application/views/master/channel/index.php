<div class="row wrapper border-bottom white-bg page-heading shadow">
    <div class="col-sm-4">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Master</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Sales Channel</strong>
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
                                foreach ($channel as $tampil) : $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $tampil->kode_channel; ?></td>
                                        <td><?= $tampil->nama_channel; ?></td>
                                        <td><?= $tampil->ket_channel; ?></td>
                                        <td>
                                            <div class="btn-group shadow">
                                                <button data-toggle="dropdown" class="btn btn-info btn btn-outline dropdown-toggle ">Tindakan</button>
                                                <ul class="dropdown-menu shadow">
                                                    <li><a class="dropdown-item" href="#modalEdit<?= $tampil->id_channel ?>" data-toggle="modal" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                                    <li><a class="dropdown-item" href="<?= base_url('channel/delete/') . $tampil->id_channel  ?>" onclick="return confirm('Yakin menghapus data <?= $tampil->nama_channel; ?>  ?!');"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>

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
                <h5 class="modal-title">Tambah Data channel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('channel') ?>" method="POST">
                <div class="modal-body">
                    <!-- isi tabel -->
                    <div class="form-group row"><label class="col-sm-2 col-form-label">kode </label>
                        <div class="col-sm-10"><input type="text" name="kode_channel" class="form-control" autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Nama Sales</label>
                        <div class="col-sm-10"><input type="text" name="nama_channel" class="form-control" autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10"><input type="text" name="ket_channel" class="form-control" autocomplete="off" autofocus></div>
                    </div>
                    <!-- end tabel -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary btn-outline" data-dismiss="modal">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ==================================  MODAL TAMBAH  ========================================= -->
<!-- ==================================  MODAL EDIT  ========================================= -->
<?php foreach ($channel as $tampil) : ?>

    <div id="modalEdit<?php echo $tampil->id_channel ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <form class="form-horizontal" method="post" action="<?php echo base_url('channel/edit') ?>">
                    <div class="modal-body">
                        <input name="id_channel" type="hidden" value="<?php echo $tampil->id_channel; ?>">

                        <div class="form-group row"><label class="col-sm-2 col-form-label">Kode </label>
                            <div class="col-sm-10"><input type="text" name="kode_channel" value=" <?= $tampil->kode_channel; ?>" class="form-control" autocomplete="off" autofocus required></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Nama Sales </label>
                            <div class="col-sm-10"><input type="text" name="nama_channel" value="<?= $tampil->nama_channel; ?>" class="form-control" autocomplete="off" autofocus required></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10"><input type="text" name="ket_channel" value="<?= $tampil->ket_channel; ?>" class="form-control" placeholder="Masukkan Nama..." autocomplete="off" autofocus></div>
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