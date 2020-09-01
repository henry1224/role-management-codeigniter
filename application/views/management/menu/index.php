<div class="row wrapper border-bottom white-bg page-heading shadow">
    <div class="col-sm-4">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Menu</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Menu Management</strong>
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
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr align="center">
                                    <th>#.</th>
                                    <th>Title</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Status</th>
                                    <th><i class="fa fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($menu as $tampil) : $no++ ?>
                                    <tr align="center">
                                        <td><?= $no; ?></td>
                                        <td><?= $tampil['title']; ?></td>
                                        <td><?= $tampil['url']; ?></td>
                                        <td><?= $tampil['icon']; ?></td>
                                        <td>
                                            <?php
                                            switch ($tampil['is_active']) {

                                                case 1:
                                                    echo '<span class="label label-info shadow">Active</span>';
                                                    break;

                                                default:
                                                    echo '<span class="label label-default shadow">Non - Active</span>';
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group shadow">
                                                <button data-toggle="dropdown" class="btn btn-info btn btn-outline dropdown-toggle ">Tindakan</button>
                                                <ul class="dropdown-menu shadow">
                                                    <li><a class="dropdown-item" href="#modalEdit<?= $tampil['id'] ?>" data-toggle="modal" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                                    <li><a class="dropdown-item" href="<?= base_url('menu/Delete/') . $tampil['id']  ?>" onclick="return confirm('Yakin menghapus data <?= $tampil['title']; ?>  ?!');"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>

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
                <h5 class="modal-title">Tambah Data Menu Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form class="form-horizontal" method="POST" action="<?php echo base_url('menu') ?>">
                <div class="modal-body">

                    <div class="form-group row"><label class="col-sm-2 col-form-label">Title </label>
                        <div class="col-sm-10"><input type="text" name="title" class="form-control" placeholder="Masukkan nama title..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Url </label>
                        <div class="col-sm-10"><input type="text" name="url" class="form-control" placeholder="Masukkan nama url..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Icon </label>
                        <div class="col-sm-10"><input type="text" name="icon" class="form-control" placeholder="Masukkan nama icon..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label"> is main menu</label>
                        <div class="col-md-10">
                            <select class="form-control chosen-select" name="is_main_menu">
                                <option value="">Pilih Submenu....</option>
                                <?php foreach ($menu as $tampil) { ?>
                                    <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['title']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Is Active ? </label>
                        <div class="col-md-6">
                            <select class="form-control" name="is_active">
                                <option value="1">Active</option>
                                <option value="0">Non - active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-outline">Tambah Data</button>
                    <button class="btn btn-secondary btn-outline" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>->
<!-- ==================================  MODAL EDIT  ========================================= -->
<?php foreach ($menu as $tampil) : ?>
    <div id="modalEdit<?php echo $tampil['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Menu Management</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <form class="form-horizontal" method="post" action="<?php echo base_url('menu/Edit') ?>">
                    <div class="modal-body">
                        <input name="id" type="hidden" value="<?php echo $tampil['id']; ?>">


                        <div class="form-group row"><label class="col-sm-2 col-form-label">Title </label>
                            <div class="col-sm-10"><input type="text" name="title" value="<?= $tampil['title']; ?>" class="form-control" placeholder="Masukkan nama title..." autocomplete="off" autofocus></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Url </label>
                            <div class="col-sm-10"><input type="text" name="url" value="<?= $tampil['url']; ?>" class="form-control" placeholder="Masukkan nama url..." autocomplete="off" autofocus></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Icon </label>
                            <div class="col-sm-10"><input type="text" name="icon" value="<?= $tampil['icon']; ?>" class="form-control" placeholder="Masukkan nama icon..." autocomplete="off" autofocus></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label"> Is Main Menu</label>
                            <div class="col-md-10">
                                <select class="form-control  chosen-select" name="is_main_menu">
                                    <option value="">Pilih Submenu....</option>
                                    <?php foreach ($menu as $sub) { ?>
                                        <option value="<?php echo $sub['id']; ?>" <?= $sub['id'] == $tampil['is_main_menu'] ? "selected" : null ?>><?php echo $sub['title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Is Active ? </label>
                            <div class="col-md-6">
                                <select class="form-control" name="is_active">
                                    <option <?php if ($tampil['is_active'] == '0') {
                                                echo "selected";
                                            } ?> value="0">Non - active</option>
                                    <option <?php if ($tampil['is_active'] == '1') {
                                                echo "selected";
                                            } ?> value="1">Active</option>
                                </select>
                            </div>
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