<div class="row wrapper border-bottom white-bg page-heading shadow">
    <div class="col-sm-4">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Utility</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Role Management</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-6">
            <?php echo validation_errors('<div class="alert alert-danger shadow" role="alert"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>') ?>
            <div class="ibox shadow">
                <div class="ibox-title"><a class="btn btn-outline btn-primary shadow" href="" data-toggle="modal" data-target="#addData">Tambah Data</a></div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr align="center">
                                    <th>#.</th>
                                    <th>Role</th>
                                    <th><i class="fa fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($role as $tampil) : $no++ ?>
                                    <tr align="center">
                                        <td><?= $no; ?></td>
                                        <td><?= $tampil['role']; ?></td>
                                        <td>
                                            <div class="btn-group shadow">
                                                <button data-toggle="dropdown" class="btn btn-info btn btn-outline dropdown-toggle ">Tindakan</button>
                                                <ul class="dropdown-menu shadow">
                                                    <li><a class="dropdown-item" href="<?= base_url('role/roleaccess/') . $tampil['id'];  ?>"><i class="fa fa-share-alt"></i> Hak Akses</a></li>
                                                    <li><a class="dropdown-item" href="#modalEdit<?= $tampil['id'] ?>" data-toggle="modal" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                                    <li><a class="dropdown-item" href="<?= base_url('role/delete/') . $tampil['id']  ?>" onclick="return confirm('Yakin menghapus data <?= $tampil['role']; ?>  ?!');"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>

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
<div id="addData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Role Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form class="form-horizontal" method="POST" action="<?php echo base_url('role') ?>">
                <div class="modal-body">

                    <div class="form-group row"><label class="col-sm-3 col-form-label">Role Management </label>
                        <div class="col-sm-9"><input type="text" name="role" class="form-control" placeholder="Masukkan nama role management..." autocomplete="off" autofocus></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-outline">Tambah Data</button>
                    <button class="btn btn-secondary btn-outline" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ==================================  MODAL EDIT  ========================================= -->
<?php foreach ($role as $tampil) : ?>
    <div id="modalEdit<?php echo $tampil['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Menu Management</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <form class="form-horizontal" method="post" action="<?php echo base_url('role/Edit') ?>">
                    <div class="modal-body">
                        <input name="id" type="hidden" value="<?php echo $tampil['id']; ?>">

                        <div class="form-group row"><label class="col-sm-3 col-form-label">Role Management </label>
                            <div class="col-sm-9"><input type="text" name="role" value="<?= $tampil['role']; ?>" class="form-control" placeholder="Masukkan nama title..." autocomplete="off" autofocus></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-outline">Edit Data</button>
                        <button class="btn btn-secondary btn-outline" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>